let calendarEl = document.getElementById('calendar');
let myModal = new bootstrap.Modal(document.getElementById('myModal'));
let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');

// Se puede hacer un event listener click con la funcion de calendar.refetch();
let filtro1 = document.getElementById('f1');
let filtro2 = document.getElementById('f2');
let filtro3 = document.getElementById('f3');
let filtro4 = document.getElementById('f4');
let filtro5 = document.getElementById('f5');
let filtro0 = document.getElementById('f0');


document.addEventListener('DOMContentLoaded', function () {
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    headerToolbar: {
      left: 'prev next today',
      center: 'title',
      right: 'dayGridMonth timeGridWeek listWeek'
    },

    events: '../../controlador/action/act_listarActividades.php',
    editable: true,
    dateClick: function (info) {
      frm.reset();
      eliminar.classList.add('d-none');
      document.getElementById('id').value = '';
      document.getElementById('start').value = info.dateStr;
      
      var clickedDate = new Date(info.dateStr);
      clickedDate.setDate(clickedDate.getDate() + 1); // Añadir un día a la fecha clicada
    
      var endDate = clickedDate.toISOString().split('T')[0]; // Convertir la fecha a formato ISO y obtener la parte de la fecha (sin la hora)
    
      document.getElementById('end').value = endDate;
      document.getElementById('btnAccion').textContent = 'Registrar';
      document.getElementById('titulo').textContent = 'Registrar Evento';
      myModal.show();
    },

    eventClick: function (info) {
      document.getElementById('id').value = info.event.id;
      document.getElementById('title').value = info.event.title;
      document.getElementById('start').value = info.event.startStr;
      document.getElementById('end').value = info.event.endStr;
      document.getElementById('color').value = info.event.backgroundColor;
      document.getElementById('btnAccion').textContent = 'Modificar';
      document.getElementById('titulo').textContent = 'Actualizar Evento';
      eliminar.classList.remove('d-none');
      myModal.show();
    },

    eventDrop: function (info) {
      const start = info.event.startStr;
      const end = info.event.endStr;
      console.log(start);
      console.log(end);
      const id = info.event.id;
      const url = '../../controlador/action/act_dragDrop.php';
      const http = new XMLHttpRequest();
      const formDta = new FormData();
      formDta.append('fecha', start);
      formDta.append('end', end);
      formDta.append('id', id);
      http.open("POST", url, true);
      http.send(formDta);
      http.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              const res = JSON.parse(this.responseText);
               Swal.fire(
                   'Avisos',
                   res.msg,
                   res.tipo
               )
              if (res.estado) {
                  myModal.hide();
                  calendar.refetchEvents();
              }
          }
      }
  }
  });


  calendar.render();

  frm.addEventListener('submit', function (e) {
    e.preventDefault();
    const title = document.getElementById('title').value;
    const fecha = document.getElementById('start').value;
    const color = document.getElementById('color').value;
    if (title == '' || fecha == '' || color == '') {
      Swal.fire(
        'Aviso',
        'Todo los campos son obligatorios',
        'warning'
      )  
    } else {
      const url = '../../controlador/action/act_guardarActividad.php';
      const http = new XMLHttpRequest();
      http.open('POST', url, true);

      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          Swal.fire(
            'Avisos',
            res.msg,
            res.tipo
          )
          if (res.estado) {
            myModal.hide();
            calendar.refetchEvents();
          }
        }
      }

    }
  });

  eliminar.addEventListener('click', function () {
    myModal.hide();
    Swal.fire({
        title: 'Advertencia',
        text: "Esta seguro de eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const id = document.getElementById('id').value;
            const url = '../../controlador/action/act_eliminarActividad.php?id='+ id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    Swal.fire(
                        'Avisos',
                        res.msg,
                        res.tipo
                    )
                    if (res.estado) {
                        calendar.refetchEvents();
                    }
                }
            }
        }
    })
  });
  
  filtro0.addEventListener("click", function(){
    redirigirActividades(0);
  });
  filtro1.addEventListener("click", function(){
    redirigirActividades(1);
  });
  filtro2.addEventListener("click", function(){
    redirigirActividades(2);
  });
  filtro3.addEventListener("click", function(){
    redirigirActividades(3);
  });
  filtro4.addEventListener("click", function(){
    redirigirActividades(4);
  });
  filtro5.addEventListener("click", function(){
    redirigirActividades(5);
  });
  
  function redirigirActividades(idTipoActividad) {
    const url = "../../controlador/action/act_filtrarActividades.php?idTipoActividad=" + idTipoActividad;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    calendar.refetchEvents();
  }
  
})