<!DOCTYPE html>
<html>
    <head>
        <title>Employee Dashboard</title>
    </head>
    <body>


        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                    header('Location: EmpMainPage.html');
                }
        ?>

        <?php include 'NoticeScroller.php';?>
            
            <h1 style="background-color:orange;" align="center">EMPLOYEE DASHBOARD</h1>

            <p style="text-align:center;">
            <img src="EshopLogo.png" alt="Eshop Logo" align="center" width="300" height="110"></p>

            </fieldset>

            <br>

            <div align="center" style="background-color:black; padding: 10px" paddin-top="10px">
                <button type="button" onclick="myLog()">Add sales log</button>
                <script>
                function myLog() {
                  location.replace("SalesLog.php")
                }
                </script>

                <button type="button" onclick="myMail()">Send mail</button>
                <script>
                function myMail() {
                  location.replace("https://www.gmail.com/")
                }
                </script>

            </div>

            <div align="center" style="background-color:orange; padding: 10px" paddin-top="10px">
                <button type="button" onclick="myNotice()">Add notice or announcements</button>
                <script>
                function myNotice() {
                  location.replace("EmpNotice.php")
                }
                </script>
            </div>


            <div align="center" style="background-color:black; padding: 10px" paddin-top="10px">
                <button type="button" onclick="mySeeInfo()">See personal information</button>
                <script>
                function mySeeInfo() {
                  location.replace("EmpInfoLogin.php")
                }
                </script>
            </div>


            <div align="center" style="background-color:orange; padding: 10px" paddin-top="10px">
                <button type="button">Show customer information</button>
            </div>

            <div align="center" style="background-color:black; padding: 10px" paddin-top="10px">
                <button type="button">Show customer purchase request</button>
            </div>

            <div align="center" style="background-color:orange; padding: 10px" paddin-top="10px">
                <button type="button" onclick="myProduct()">See products</button>
                <script>
                function myProduct() {
                  location.replace("EmpProduct.php")
                }
                </script>

                <button type="button" onclick="myLeaveApp()">Leave application</button>
                <script>
                function myLeaveApp() {
                  location.replace("EmpLeaveApp.php")
                }
                </script>
            </div>

        

            <div align="center" style="background-color:black; padding: 10px" paddin-top="10px">
                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <input type="submit" value="Logout">
                 </form>
            </div>
        
    </body>
</html>


