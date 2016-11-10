<!--SLIDER START-->
<div id="ninja-slider">
    <div class="slider-inner">
        <ul>
            <?php 
            $numImages = 7;
            $captions = array(
                "Welcome to State Street Brats",
                "Caption 2",
                "Caption 3",
                "Caption 4",
                "Caption 5",
                "Caption 6",
                "Caption 7",
            ); 

            for ($i = 1 ; $i <= $numImages ; $i++) :
            ?>
                <li>
                    <a class="ns-img" href="images/header_slider/<?= $i ?>.jpg"></a>
                    <div class="caption"><?= $captions[$i - 1] ?></div>
                </li>
            <?php endfor ?>
            <!--
            <li>
                <a class="ns-img" href="images/header_slider/1.jpg"></a>
                <div class="caption">RESPONSIVE</div>
            </li>
            <li>
                <a class="ns-img" href="img/2.jpg"></a>
                <div class="caption">TOUCH·ENABLED</div>
            </li>
            <li>
                <a class="ns-img" href="img/3.jpg"></a>
                <div class="caption">VIDEO·AUDIO</div>
            </li>
            <li>
                <a class="ns-img" href="img/4.jpg"></a>
                <div class="caption">NON·JQUERY</div>
            </li>
            <li>
                <a class="ns-img" href="img/5.jpg"></a>
                <div class="caption">MOBILE·FRIENDLY</div>
            </li>
            -->
        </ul>
        <div class="navsWrapper">
            <div id="ninja-slider-prev"></div>
            <div id="ninja-slider-next"></div>
        </div>
    </div>
</div>
<!--SLIDER END-->