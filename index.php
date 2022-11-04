
<?php # Script 3.4 - index.php
$page_title = 'MANGO - Homepage';
include('includes/header.html');
include('login.php');
?>



<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="https://images.unsplash.com/photo-1523950704592-ee4866469b4c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1900&q=80" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="https://images.unsplash.com/photo-1542062700-9b61ccbc1696?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1900&q=80" alt="Chicago">
        </div>

        <div class="item">
            <img src="https://images.unsplash.com/photo-1493655161922-ef98929de9d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1700&q=80" alt="New York">
        </div>

        <div class="item">
            <img src="https://images.unsplash.com/photo-1584720175631-f9d3633a2e78?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1700&q=80" alt="New York">
        </div>
    </div>

</div>

<!-- Horizontal scroll -->
<div class="trending" id="trending">
    <div id="arrow">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
    </div>
    <div class="text">
        <p>TRENDING</p>
    </div>
    <div class="h-scroll">
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
        <div class="item-ct">
            <img src="https://img.ltwebstatic.com/images3_pi/2022/08/04/16595916306b89242477393373d04b6499d24f518d_thumbnail_900x.webp" alt="">

        </div>
    </div>
</div>


<div class="story" id="story">
    <div class="stText" id="stText">
        <p class="capText" id="capText">SINCE 1998</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta rem necessitatibus quos? Suscipit, dignissimos adipisci natus voluptas quis accusantium nam ipsum ipsam. Maxime esse ab asperiores nihil soluta voluptate rerum?</p>
    </div>
    <div class="stImg"><img src="https://images.unsplash.com/photo-1520975661595-6453be3f7070?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt=""></div>
</div>
<script src="includes/index.js"></script>

<?php
// include('includes/index.js');
include('includes/footer.html');
?>