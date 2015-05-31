<center><h1>Welcome to NOWJOU</h1></center>

<div style="width:1000px; display: table; margin: auto;">
    <div style="display: table-row">
        <div style="width: 600px; display: table-cell;">
            <h2>Log in</h2>
            <form method="post" action="./authentication/login" style="width: 500px">
                <table>
                    <tr><td>Email</td><td><input type="email" name="email" value="user@ajou.co.kr"/></td></tr>
                    <tr><td>Password</td><td><input type="password" name="password" value="user"/></td></tr>

                </table>
                <input type="submit" value="Log in"/>
            </form>
        </div>
        <div style="display: table-cell;">
            <h2>Sign up</h2>
            <form method="post" action="./authentication/signup" style="width:500px">
                <table>
                    <tr><td>First name</td><td><input type="text" name="first_name"/></td></tr>
                    <tr><td>Last name</td><td><input type="text" name="last_name"/></td></tr>
                    <tr><td>Email</td><td><input type="email" name="email"/></td></tr>
                    <tr><td>Re-enter email</td><td><input type="email" name="reenter_email"/></td></tr>
                </table>
                <input type="submit" value="Sign Up"/>
            </form>
        </div>
    </div>
</div>

