var selection = document.getElementById('tipo');
selection.value = 'muebles'; // opción por defecto

function showForm() {
  var campos = {
    'muebles': document.getElementById('campo_mueble'),
    'software': document.getElementById('campo_software'),
    'hardware': document.getElementById('campo_hardware'),
    'vehiculos': document.getElementById('campo_vehiculos')
  };
  var selected = selection.value;
  hideElements(campos);
  if (campos[selected]) {
    showElement(campos[selected]);
  } else {
    console.log('El campo no existe');
  }
  // document.getElementById('btnInsertar').style.display = 'block';
}

function hideElements(campos) {
  for (var key in campos) {
    if (campos.hasOwnProperty(key)) {
      campos[key].style.display = 'none';
    }
  }
}

function showElement(element) {
  element.style.display = 'block';
}
