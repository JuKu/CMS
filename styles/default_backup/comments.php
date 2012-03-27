<div class="comments">
    <h2><u>Kommentare</u></h2>
        <table border="0">
            <tr>
                <td>{COMMENTS}</td>
            </tr>
        </table>
        <br />
        
        <b>Kommentar schreiben</b>
        
        <form action="{PAGE}" method="post">
            <input type="hidden" name="userid" value="{USERID}" />
            <div class="comment_form">
                <table border="0">
                    <tr>
                        <td width="200">Name: </td>
                        <td width="200"><input type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <td>E-Mail: </td>
                        <td><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                        <td>Text: </td>
                        <td><textarea name="text"></textarea></td>
                    </tr>
                    <tr>
                        <td>Absenden: </td>
                        <td><input type="submit" name="Absenden" value="Absenden" /></td>
                    </tr>
                </table>
            </div>
        </form>
        
</div>

<style type="text/css">

.comment_form {
    color:black;
}

</style>