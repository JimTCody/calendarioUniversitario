const botonEditar1 = document.querySelector(".editar1");
const botonCancelar1 = document.querySelector(".cancelar1");
const botonGuardar1 = document.querySelector(".guardar1");

const botonEditar2 = document.querySelector(".editar2");
const botonCancelar2 = document.querySelector(".cancelar2");
const botonGuardar2 = document.querySelector(".guardar2");

const botonEditar3 = document.querySelector(".editar3");
const botonCancelar3 = document.querySelector(".cancelar3");
const botonGuardar3 = document.querySelector(".guardar3");

const botonEditar4 = document.querySelector(".editar4");
const botonCancelar4 = document.querySelector(".cancelar4");
const botonGuardar4 = document.querySelector(".guardar4");

const inputedit2 = document.querySelector(".input-edit2");
const edit2 = document.querySelector(".edit2");

const inputedit3 = document.querySelector(".input-edit3");
const edit3 = document.querySelector(".edit3");

const inputedit4 = document.querySelector(".input-edit4");
const edit4 = document.querySelector(".edit4");
function mostrarBotones1(){
  botonCancelar1.hidden = false;
  botonEditar1.hidden = true;
  botonGuardar1.hidden = false;
};

function mostrarEditar1(){
  botonCancelar1.hidden = true;
  botonEditar1.hidden = false;
  botonGuardar1.hidden = true;
};
function mostrarBotones2(){
  botonCancelar2.hidden = false;
  botonEditar2.hidden = true;
  botonGuardar2.hidden = false;
};

function mostrarEditar2(){
  botonCancelar2.hidden = true;
  botonEditar2.hidden = false;
  botonGuardar2.hidden = true;
};
function mostrarBotones3(){
  botonCancelar3.hidden = false;
  botonEditar3.hidden = true;
  botonGuardar3.hidden = false;
};

function mostrarEditar3(){
  botonCancelar3.hidden = true;
  botonEditar3.hidden = false;
  botonGuardar3.hidden = true;
};

function mostrarBotones4(){
  botonCancelar4.hidden = false;
  botonEditar4.hidden = true;
  botonGuardar4.hidden = false;
};

function mostrarEditar4(){
  botonCancelar4.hidden = true;
  botonEditar4.hidden = false;
  botonGuardar4.hidden = true;
};

function mostrarInput2(){
  inputedit2.hidden = false;
  edit2.hidden = true;
};

function cancelarInput2(){
  inputedit2.hidden = true;
  edit2.hidden = false;
};
function mostrarInput3(){
  inputedit3.hidden = false;
  edit3.hidden = true;
};

function cancelarInput3(){
  inputedit3.hidden = true;
  edit3.hidden = false;
};

function mostrarInput4(){
  inputedit4.hidden = false;
  edit4.hidden = true;
};

function cancelarInput4(){
  inputedit4.hidden = true;
  edit4.hidden = false;
};