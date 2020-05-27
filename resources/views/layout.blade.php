<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css\layout.css') }} " rel="stylesheet" type="text/css"/>
        @yield('links')
        <title>My Ticketing system!</title>
    </head>
    <body style="background-color: rgb(255, 255, 255)">
        <div id="layout-header">
            <div class="m-b-md">
               <a href="/" style="text-decoration: none"><h1 id="title">The "Ticketing system"</h1></a>
            </div>

            <div id="login-button">
                <form action="/login">
                    <button id="button">{{ $loggedIn }}</button>
                </form>    
            </div>

            <div id="links-table">
                <table>
                    <tr>
                        <td>
                            <a href="/tickets/create" class="links">Submit a ticket</a>
                            <a href="/contact" class="links">Contact</a>
                            <a href="/faq" class="links">FAQ</a>
                            <a href="/about-us" class="links">About Us</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
       <div class="content">
            @yield('content')
        </div> 
        
        <div id="page-container">
            <div id="content-wrap">
                <footer id="footer">
                    <a href="/about-us" style="text-decoration: none"> <h2 id="logo" style="color: white">Asseco</h2></a>
                </footer>
            </div>
        </div>
    </body>
</html>
