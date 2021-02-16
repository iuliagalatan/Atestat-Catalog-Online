<?php

    function CitesteDateUser($id_user)
    {
        $v = Query_Select("SELECT * FROM users WHERE user_id='{$id_user}'");
        
        print DB_Error();
        
        if($v === false)
            return false;
        if(Count($v) == 0)
            return false;
        $u = $v[0];
        
        // eventual alte prelucrari
        
        return $u;
    }
    
    function Login()
    {
        if(isset($_SESSION['u_id']))
            return intval($_SESSION['u_id']);
        return 0;
    }
    
    function EsteElev($id_user)
    {
        $u = CitesteDateUser($id_user);
        if($u === false)
            return false;
        if($u['este_elev'])
            return true;
        return false;
    }
    
    function EsteAdmin($id_user)
    {
        $u = CitesteDateUser($id_user);
        if($u === false)
            return false;
        if($u['este_admin'])
            return true;
        return false;
    }
    
    function Parola($parola_in_clar)
    {
        // construieste varianta criptata a parolei, pornind de la varianta in clar
        // deocamdata returneaza parola in clar
        
        return $parola_in_clar;
    }
    
    function CreareAlerta($mesaj_alerta, $tip_alerta)
    {
        $_SESSION['alerta'] = [
            'mesaj' => $mesaj_alerta,
            'tip'   => $tip_alerta
        ];
    }
    
    function AfisareAlerta()
    {
        if(isset($_SESSION['alerta']))
        {
            ?>
            <div class="alert alert-<?=$_SESSION['alerta']['tip']?>">
                <?=$_SESSION['alerta']['mesaj']?>
            </div>
            <?php
            unset($_SESSION['alerta']);
        }
    }

    function AfisareTabel($v, $campuri = false, $buton = false)
    {
        if($campuri === FALSE)
        {
            $campuri = [];
            foreach($v[0] as $i => $x)
                $campuri[$i] = $i;
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nr.Cr.</th>
                    <?php
                        foreach($campuri as $i => $x)
                        {
                            ?> <th><?=$x?></th> <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cnt = 0;
                    foreach($v as $l)
                    {
                        $cnt ++;
                        ?>
                    <tr>
                        <td><?=$cnt?></td>
                        <?php
                            foreach($campuri as $i => $x)
                            {
                                ?> <td><?=$l[$i]?></td> <?php
								
                            }
							
								if ( $buton === TRUE )
								{
									
									?><div class = form-group><td><input type="checkbox" class="form-control"  name ="check_list[]"  id="id" value =<?=$l['id']?>></td><?php
								}
							
							
                        ?>
                    </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
		
        <?php
    }
    
    function AfisareFormularAdaugare($action_file, $campuri)
    {
        ?>
            <form action="<?=$action_file?>" method="POST">
                <?php
                    foreach($campuri as $i => $x)
                    {
                        ?>
                        <div class="form-group">
                            <label for="<?=$i?>" class="control-label"><?=$x?></label>
                            <input name="<?=$i?>" id="<?=$i?>" class="form-control">
                        </div>
                        <?php
                    }
                ?>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        Adăugare
                    </button>
                </div>
            </form>
        <?php
    }