 <!-- Page Loader -->
 <div class="page-loader-wrapper">
     <div class="loader">
         <div class="mt-4"><img src="assets/img/logo_black.png" width="96" alt="Refine"></div>
         <p style="color: black !important;">Lütfen bekleyiniz...</p>
     </div>
 </div>

 <div class="overlay"></div>

 <!-- Left Sidebar -->
 <aside id="minileftbar" class="minileftbar">
     <ul class="menu_list">
         <li>
             <a href="javascript:void(0);" class="bars"></a>
             <a class="navbar-brand" href="index.php"><img src="assets/img/logo_white.png" alt="Refine"></a>
         </li>
         <li class="power">
             <!-- <a href="SETTINGS" class="js-right-sidebar"><i class="zmdi zmdi-settings"></i></a> -->
             <a href="logout.php" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
         </li>
     </ul>
 </aside>

 <aside class="right_menu">

     <div id="leftsidebar" class="sidebar">
         <div class="menu">
             <ul class="list">
                 <li>
                     <div class="user-info mb-3">
                         <div class="image">
                             <a href="#"><img src="assets/img/profileIcon.png" alt="" style="object-fit:contain;width:100px !important;height:100px !important;"></a>
                         </div>
                         <div class="detail">
                             <h6><?= $userFullname ?></h6>
                             <p class="mb-0"><?= $userMail ?></p>
                             <!-- <a href="SETTINGS" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-settings"></i></a> -->
                             <a href="logout.php" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-power"></i></a>
                         </div>
                     </div>
                 </li>

                 <li> <a href="index.php"><i class="zmdi zmdi-home"></i><span>Anasayfa</span></a></li>

                 <li class="header">HAKKIMIZDA</li>
                 <li><a href="edit-abous-us.php"><i class="zmdi zmdi-file-text"></i><span>Hakkımızda</span></a></li>

                 <li class="header">ÜRÜN</li>
                 <li> <a href="products.php"><i class="zmdi zmdi-assignment"></i><span>Ürünler</span></a> </li>
                 <li> <a href="product-category.php"><i class="zmdi zmdi-grid"></i><span>Ürün Kategori</span></a> </li>

                 <li class="header">BLOG</li>
                 <li><a href="blogs.php"><i class="zmdi zmdi-delicious"></i><span>Bloglar</span></a></li>
                 <li> <a href="blog-category.php"><i class="zmdi zmdi-copy"></i><span>Blog Kategori</span></a></li>

                 <li class="header">PCB DESIGN</li>
                 <li><a href="edit-pcb-design.php"><i class="zmdi zmdi-globe-alt"></i><span>PCB Design</span></a></li>

                 <li class="header">İLETİŞİM</li>
                 <li><a href="contacts.php"><i class="zmdi zmdi-phone"></i><span>İletişim Bilgileri</span></a></li>
                 <!-- class="sm_menu_btm active open" -->
             </ul>
         </div>
     </div>
 </aside>