<?php
include("cnc.php");
echo"  <form action='send.php' method='post'>
    <fieldset>
      <legend>Send Money</legend>

    <table>
      <tr>
        <td><label for='ru'>receiver's username :</label></td>
        <td><input type='text' name='ru' id='ru'></td>
      </tr>
      <tr>
        <td><label for='rcn'>receiver's card number :</label></td>
        <td><input type='text' name='rcn' id='rcn'></td>
      </tr>
      <tr>
        <td><label for='am'>Amount :</label></td>
        <td><input type='number' name='am' id='am'></td>
      </tr>
      <tr>
        <td><label for='vp'>Verify your password :</label></td>
        <td><input type='password' name='vp' id='vp'></td>
      </tr>
      <tr>
        <td><input type='submit' value='send'></td>
        <td><input type='reset' value='reset'></td>
      </tr>
    </table>
    </fieldset>
  </form>";