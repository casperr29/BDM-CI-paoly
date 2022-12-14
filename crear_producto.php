<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Crear producto</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cssarely/crear_producto.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>Crear producto</h3>
      <p> <a href="dashboard.php">Regresar al inicio</a></p>
   </div>

   <section class="checkout">

      <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
         <h3>Datos del producto</h3>
         <div class="flex">
            <div class="inputBox">
               <span>Nombre:</span>
               <input type="text" id="name" name="name" placeholder="Ingrese el nombre del producto">
            </div>
            <div class="inputBox">
               <span>Precio:</span>
               <input type="number" id="price" name="price" placeholder="Ingrese el precio">
            </div>
            <div class="inputBox">
               <span>Autor:</span>
               <input type="text" id="autor" name="autor" placeholder="Ingrese el autor">
            </div>
            <div class="inputBox">
               <span>Año:</span>
               <input type="text" id="year" name="year" placeholder="1999">
            </div>
            <div class="inputBox">
               <span>Descripción:</span>
               <textarea type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción"></textarea>
            </div>

            <div class="inputBox">
               <span>Categorias:</span>
               <div id="ctg_list_rad">

                  <div class="form-check">
                     <label class="form-check-label" for="ctg-1">Ciencia Ficción</label>
                     <input type="checkbox" name="categoria" class="form-check-input" id="ctg-1" value="3">
                  </div>

                  <div class="form-check">
                     <label class="form-check-label" for="ctg-2">Erótico</label>
                     <input type="checkbox" name="categoria" class="form-check-input" id="ctg-2" value="2">
                  </div>

                  <div class="form-check">
                     <label class="form-check-label" for="ctg-3">Fantasía</label>
                     <input type="checkbox" name="categoria" class="form-check-input" id="ctg-3" value="1">
                  </div>

               </div>
            </div>
            

            <!-- IMAGENES EXTRA  -->
            <div class="inputBox">
               <span>Imagenes:</span>
               <div>
                  <div class="extra_img_list">

                     <!-- <div class="extra_img_container d-flex justify-content-center align-items-center">
                              <img src="../../Elementos/Chavis.jpg" alt="Media Cont" id="FotografiadeCurso" class=" fotoCurso bottom top mb-2" >
                              <img src="../../Elementos/1200px-Flat_cross_icon.svg.png" class="fotoCurso delete-icon align-middle mb-2">
                            </div>

                            <div>
                              <img alt="Media Cont" id="FotografiadeCurso" class="fotoCurso top mb-2" style="width:auto;">
                            </div> -->
                  </div>
                  <div id="extra_img_array"> </div>
                  <input id="upload_extra_pic" type="file" name="Fotografia1" placeholder="Contenido multimedia" class="input-foto mb-1">
                  <input id="exampleEPic" name="ePic" hidden="true">
               </div>

               <div>
                  <div class="extra_img_list">

                     <!-- <div class="extra_img_container d-flex justify-content-center align-items-center">
                              <img src="../../Elementos/Chavis.jpg" alt="Media Cont" id="FotografiadeCurso" class=" fotoCurso bottom top mb-2" >
                              <img src="../../Elementos/1200px-Flat_cross_icon.svg.png" class="fotoCurso delete-icon align-middle mb-2">
                            </div>

                            <div>
                              <img alt="Media Cont" id="FotografiadeCurso" class="fotoCurso top mb-2" style="width:auto;">
                            </div> -->
                  </div>
                  <div id="extra_img_array"> </div>
                  <input id="upload_extra_pic" type="file" name="Fotografia2" placeholder="Contenido multimedia" class="input-foto mb-1">
                  <input id="exampleEPic" name="ePic" hidden="true">
               </div>

               <div>
                  <div class="extra_img_list">

                     <!-- <div class="extra_img_container d-flex justify-content-center align-items-center">
                              <img src="../../Elementos/Chavis.jpg" alt="Media Cont" id="FotografiadeCurso" class=" fotoCurso bottom top mb-2" >
                              <img src="../../Elementos/1200px-Flat_cross_icon.svg.png" class="fotoCurso delete-icon align-middle mb-2">
                            </div>

                            <div>
                              <img alt="Media Cont" id="FotografiadeCurso" class="fotoCurso top mb-2" style="width:auto;">
                            </div> -->
                  </div>
                  <div id="extra_img_array"> </div>
                  <input id="upload_extra_pic" type="file" name="Fotografia3" placeholder="Contenido multimedia" class="input-foto mb-1">
                  <input id="exampleEPic" name="ePic" hidden="true">
               </div>
            </div>

            <!-- VIDEOS EXTRA  -->
            <div class="inputBox">

               <span>Videos:</span>
               <div>

                  <div class="extra_vid_list">
                     <!-- <video class="mb-2" width="220" height="140" controls>
                              <source src="movie.mp4" type="video/mp4">
                              <source src="movie.ogg" type="video/ogg">
                              Your browser does not support the video tag.
                            </video> -->
                  </div>

                  <div id="extra_vid_array"></div>
                  <input id="upload_extra_vid" type="file" name="video" placeholder="Contenido multimedia" class="input-foto mb-1">
                  <input id="exampleEVid" name="eVid" hidden="true">
               </div>
            </div>
         </div>
         <input type="submit" value="Dar de alta" class="btn" name="order_btn" onclick=vDatosIncompletosProducto()>
      </form>

   </section>

   <template id="AlertDatosIncompletos">
            <swal-title>
                Ups, te faltan datos
            </swal-title>
            <swal-html>
                <p>por favor llena todos los datos primero</p>
            </swal-html>
            <swal-icon type="warning" color="red"></swal-icon>
            <swal-button type="confirm" color="#c9729f">
                OK
            </swal-button>
        </template>

   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="jsarely/checkout.js"></script>

</body>

</html>