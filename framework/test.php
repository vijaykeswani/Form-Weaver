<?php
include ("variables.php");
session_start();
?>

        <h3 class="fontface">Share Responses</h3>
       <form action="mform0.php" method="POST" class="col col_7">

<fieldset>
                <legend>Whom Do you Want To Share The Responses?</legend>

<input type="hiddien" value="privilege" name="privilege">
            <div>
                <label>Username</label>
                <input type="text" name="user2" class="box_shadow" />@iitk.ac.in
            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user3" class="box_shadow" />@iitk.ac.in

            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user4" class="box_shadow" />@iitk.ac.in

            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user5" class="box_shadow" />@iitk.ac.in

            </div>



<input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </fieldset>
    </form>


