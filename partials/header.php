<header>
            <div class="lien">
                <div class="tete">The Power Of Memory</div>
                
                <nav>
                    <ul>
                        <?php if($NamePage == "home"): ?> 
                            <li><a class="orange" href= "<?= PROJECT_FOLDER ?>index.php">ACCEUIL </a></li>
                        <?php else:?>
                            <li><a href= "<?= PROJECT_FOLDER ?>index.php">ACCEUIL </a></li>
                        <?php 
                            endif; ?>


                        <?php  if($NamePage == "game"): ?> 
                            <li><a class="orange" href="<?= PROJECT_FOLDER ?>games/memory/index.php">JEU</a></li>
                            <?php else:?>
                                <li><a href="<?= PROJECT_FOLDER ?>games/memory/index.php">JEU</a></li>
                            <?php
                             endif; ?>


                         <?php if($NamePage =="score"):?>
                            <li><a class="orange" href="<?= PROJECT_FOLDER ?>games/memory/scores.php">SCORES</a></li>
                            <?php else:?>
                            <li><a  href="<?= PROJECT_FOLDER ?>games/memory/scores.php">SCORES</a></li>
                        <?php
                        endif; ?>
                        
                       
                        <?php  if($NamePage=="contact"):?>  
                            <li><a class="orange" href= "<?= PROJECT_FOLDER ?>contact.php">NOUS CONTACTER</a></li>
                            <?php else:?>
                        <li><a href= "<?= PROJECT_FOLDER ?>contact.php">NOUS CONTACTER</a></li>   
                        <?php
                        endif; ?>

                        <?php if($NamePage == "account"):?>
                            <li><a class="orange" href= "<?= PROJECT_FOLDER ?>myAccount.php">MON ESPACE</a></li>
                        <?php else:?>
                            <li><a href= "<?= PROJECT_FOLDER ?>myAccount.php">MON ESPACE</a></li>
                        <?php
                        endif; ?>

                        <?php if($NamePage == "registe"):?>
                            <li><a class="orange" href= "<?= PROJECT_FOLDER ?>register.php">INSCRIPTION </a></li>
                        <?php else:?>
                            <li><a href= "<?= PROJECT_FOLDER ?>register.php">INSCRIPTION</a></li>
                        <?php
                        endif; ?>

                        <?php if($NamePage == "login"):?>
                            <li><a  class="orange" href= "<?= PROJECT_FOLDER ?>login.php">CONNEXION</a></li>
                        <?php else:?>
                            <li><a href= "<?= PROJECT_FOLDER ?>login.php">CONNEXION</a></li>
                            <?php
                            endif; ?>

                        <?php if($NamePage == "boutique"):?>
                            <li><a  class=orange href= "<?= PROJECT_FOLDER ?>boutique.php">BOUTIQUE</a></li>
                        <?php else:?>
                            <li><a href= "<?= PROJECT_FOLDER ?>boutique.php">BOUTIQUE</a></li>
                            <?php
                            endif; ?>
                    </ul>

            



                </nav>

            </div>
        </header>