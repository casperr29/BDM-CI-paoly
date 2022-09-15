function productoAprobado(){
    Swal.fire(
        'Aprobado!',
        '¡El producto fue aprobado!',
        'success'
      )
}

function productoNoAprobado(){
    Swal.fire({
        title: 'Estas seguro de no aprobar este producto?',
        text: "Esta decision no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, no quiero aprobarlo!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'No aprobado!',
            'El producto fue rechazado con exito.',
            'success'
          )
        }
      })
}