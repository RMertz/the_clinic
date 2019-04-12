<?php global $base_url; ?> 
<div class="header">

    <div class="headerRow">
        <div class= "column left">
            <h1>The Clinician's Guide</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src=<?php
                if(getcwd() == "/Applications/MAMP/htdocs/try2/the_clinic/webpages/bipolar/bipolarM"||getcwd() == "/Applications/MAMP/htdocs/try2/the_clinic/webpages/bipolar/bipolarD"){
                    echo "../../images/HeaderImageOutline.png";
                }elseif (getcwd() == "/Applications/MAMP/htdocs/try2/the_clinic/webpages"){
                    echo "images/HeaderImageOutline.png";
                }else{
                    echo "../images/HeaderImageOutline.png";
                }
                ?> alt="HeaderImage">
            </div>
        </div>
    </div>
</div>