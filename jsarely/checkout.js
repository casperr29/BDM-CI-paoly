function vDatosIncompletosUsuario(){
    var name=document.getElementById("name").value;
    var number=document.getElementById("number").value;
    var email=document.getElementById("email").value;
    var payment=document.getElementById("payment").value;
    var calle=document.getElementById("calle").value;
    var street=document.getElementById("street").value;
    var city=document.getElementById("city").value;
    var state=document.getElementById("state").value;
    var country=document.getElementById("country").value;
    var pin_code=document.getElementById("pin_code").value;

    if(name=="" || number=="" || email=="" || payment=="" || calle=="" || email=="" || street=="" || city=="" || state=="" || country=="" || pin_code==""){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
    }
    
}

function vDatosIncompletosProducto(){
    var name=document.getElementById("name").value;
    var price=document.getElementById("price").value;
    var autor=document.getElementById("autor").value;
    var year=document.getElementById("year").value;
    var descripcion=document.getElementById("descripcion").value;

    if(name=="" || price=="" || autor=="" || year=="" || descripcion=="" ){
        Swal.fire({
            template: '#AlertDatosIncompletos'
          })
    }
    
}

function vCarrito(usuario, id, precio, cantidad, token){

  let url='includes/carrito.php'
  let formData=new FormData()
  formData.append('usuario', usuario)
  formData.append('id', id)
  formData.append('precio', precio)
  formData.append('cantidad', cantidad)
  formData.append('token', token)

  fetch(url, {
    method: 'POST',
    body: formData,
    mode: 'cors'
  }).then(response=>response.json())
  .then(data=>{
    if(data.ok){

      const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Producto a??adido al carrito'
      })
    }
  })

}

function vWishlist(usuario, id, token){

  let url='includes/wishlist.php'
  let formData=new FormData()
  formData.append('usuario', usuario)
  formData.append('id', id)
  formData.append('token', token)

  fetch(url, {
    method: 'POST',
    body: formData,
    mode: 'cors'
  }).then(response=>response.json())
  .then(data=>{
    if(data.ok){

      const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Se a??adio a tu lista de deseados'
      })
    }
  })

}

