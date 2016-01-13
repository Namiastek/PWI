<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <?php include("config.php"); ?>
        <?php include("clean_input.php"); ?>
        <?php include("dbconn.php"); ?>
        <?php //include("getrecord.php"); ?>
    </head>

    <body>
        <?php
        include('navbar.php'); 
        ?>
        <form action="action_login.php" name="saveform" METHOD="POST" align="center">
            <div align="center">
                <center>
                    <table border="0" height="59" width="310" bgcolor="#808080" cellspacing="1" cellpadding="0">
                        <div align="center">
                            <tr>
                                <td width="248" height="19" bgcolor="#C0C0C0"  align="right">Login:</td>
                                <td width="123" height="19" bgcolor="#C0C0C0">
                                    <input NAME="username" VALUE SIZE="8" MAXLENGTH="16" tabindex="1">
                                </td>
                                <td width="47" height="19" align="center" bgcolor="#C0C0C0">               
                                    <a href="javascript:alert('LLogin musi miec miedzy 4 a 16 znaków.')">pomoc</a>
                                </td>
                            </tr>
                            <tr align="center">
                                <td width="248" height="17" bgcolor="#C0C0C0" align="right">Hasło:</td>
                                <td height="17" width="123" bgcolor="#C0C0C0" align="left">
                                    <input type="password" name="password" size="8" tabindex="2" maxlength="8">
                                </td>
                                <td width="47" height="17" align="center" bgcolor="#C0C0C0">
                                    <a href="javascript:alert('Hasło musi  miec pomiędzy 4-8 znaków.')">pomoc</a>
                                </td>
                            </tr>
                            <tr align="center">
                                <td bgcolor="#C0C0C0" colspan="3">
                                    <input TYPE="button" NAME="FormsButton2" VALUE="Zaloguj" ONCLICK="validateForm()" tabindex="3">
                                </td>
                            </tr>
                        </div>
                    </table>
                </center>
            </div>
        </form>


        <p align="center">&nbsp;</p>
        <?php include("footer.php"); ?>
    </body>
</html>