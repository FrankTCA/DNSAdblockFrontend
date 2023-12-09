<?php
require "../sso/common.php";
validate_token("https://infotoast.org/dns/");
if (get_user_level() < 2) {
    http_response_code(403);
    die("<!DOCTYPE html><html lang='en'><head><title>403 Forbidden</title><meta http-equiv=\"refresh\" content=\"3;url=https://infotoast.org/tools/\" /></head><body><div class='bg'><h1>Unauthorized</h1><br><svg width='64px' height='64px' version=\"1.1\" id=\"Layer_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewBox=\"0 0 512 512\" enable-background=\"new 0 0 512 512\" xml:space=\"preserve\"><g><polygon fill=\"#BC1B1B\" points=\"355.8,15 156.2,15 15,156.2 15,355.8 156.2,497 355.8,497 497,355.8 497,156.2 	\"/></g><line fill=\"#FFFFFF\" stroke=\"#FFFFFF\" stroke-width=\"10\" stroke-miterlimit=\"10\" x1=\"113\" y1=\"118\" x2=\"389\" y2=\"381\"/><line fill=\"#FFFFFF\" stroke=\"#FFFFFF\" stroke-width=\"10\" stroke-miterlimit=\"10\" x1=\"389\" y1=\"118\" x2=\"113\" y2=\"381\"/></svg><span>This page is only for premium subscribers.</span><p>Normally, this page would display the IP address to place into your router.</p><p>You will be redirected automatically in 3 seconds. If not, click <a href='https://infotoast.org/tools/'>here</a>.</p></div></body></html>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DNS IP Address</title>
    <link rel="stylesheet" type="text/css" href="resources/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/local.css"/>
    <script type="text/javascript" src="resources/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
</head>
<body>
    <div class="top">
        <div class="topleft">
            <h1>Ad-Block DNS Server</h1>
        </div>
        <div class="topright">
            <a href="https://infotoast.org/sso/" class="divLink" id="loginButton">
                <div class="loginbutton">
                    <svg class="user" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve" width="40px" height="40px"><g><path fill="#FFFFFF" fill-opacity="0" d="M30.6,111.5c5.8-29.9,18.8-49.2,33.2-49.2c14.2,0,27.1,18.9,33,48.2L30.6,111.5z"/><path d="M63.8,62.8c13.9,0,26.5,18.5,32.4,47.2l-65,0.9C37,81.7,49.7,62.8,63.8,62.8 M63.8,61.8C48.6,61.8,35.6,82.5,30,112l67.4-0.9C91.7,82.1,78.8,61.8,63.8,61.8L63.8,61.8z"/></g><line fill="none" stroke="#FFFFFF" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" x1="103.5" y1="68.5" x2="82.4" y2="68.8"/><line fill="none" stroke="#FFFFFF" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" x1="48.5" y1="69.3" x2="31.5" y2="69.5"/><g><path fill="#FFFFFF" fill-opacity="0" d="M64.5,59.5c-7.2,0-13-5.8-13-13v-7c0-7.2,5.8-13,13-13c7.2,0,13,5.8,13,13v7C77.5,53.7,71.7,59.5,64.5,59.5z"/><path d="M64.5,27C71.4,27,77,32.6,77,39.5v7C77,53.4,71.4,59,64.5,59C57.6,59,52,53.4,52,46.5v-7C52,32.6,57.6,27,64.5,27 M64.5,26L64.5,26C57,26,51,32,51,39.5v7C51,54,57,60,64.5,60h0C72,60,78,54,78,46.5v-7C78,32,72,26,64.5,26L64.5,26z"/></g></svg>
                    <span id="loginText" class="littleMsg">Hi, <?php echo get_username() ?>!</span>
                </div>
            </a>
        </div>
    </div>
    <div class="theBody">
        <div class="iconBodyHeader" id="firstHeader">
            <h2>Step 1: Log into your router</h2>
        </div>
        <div class="iconSet">
            <p>Most routers can generally be logged into at <a href="http://192.168.0.1" target="_blank">192.168.0.1</a>.</p>
            <p>Please look at the back of your router for login details and/or the IP to connect to.</p>
        </div>
        <div class="iconBodyHeader">
            <h2>Step 2: Find your DNS Servers</h2>
        </div>
        <div class="iconSet">
            <p>Your DNS servers are generally located in a page (or subpage) called "IPv4".</p>
            <p>That will contain controls for both your networking and the DNS servers.</p>
            <p>Many routers vary, and it may be located somewhere else.</p>
            <p>Look online for a solution if you cannot find it with the make and model of your router.</p>
        </div>
        <div class="iconBodyHeader">
            <h2>Step 3: Paste the Following</h2>
        </div>
        <div class="iconSet">
            <p class="errorMsg"></p>
            <p>Paste the following as your IPv4 DNS:</p>
            <br><div class="center">
                <div class="copypaste">
                    <p class="IP" id="theIP"></p>
                    <button class="copybutton" id="copybutton">Copy</button>
                </div>
            </div><br>
            <p>There is typically two to four other boxes for DNS. Type "0.0.0.0" in those boxes.</p>
            <p>Then, move over to the IPv6 page, and overwrite all IPv6 DNS servers with 0000::0000::0000::0000::0000::0000::0000::0000</p>
        </div>
        <div class="iconBodyHeader">
            <h2>Complete!</h2>
        </div>
        <div class="iconSet">
            <p>There should now be ad and tracker blocking everywhere in your network.</p>
            <p>If you need assistance, please email me at <a href="mailto:frank@infotoast.org">frank@infotoast.org</a></p>
            <p>Thank you for using our DNS server!</p>
        </div>
        <p><i>We do not log any DNS queries that go to our server, even anonymously.</i></p>
        <input type="text" name="ip" id="ip">
    </div>
</body>
</html>
