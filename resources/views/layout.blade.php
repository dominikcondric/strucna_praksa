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

            <div id="login-button-area">
                <form action="/login">
                    @if (\App\User::$loggedIn)
                        <button class="button">{{ \App\User::find(\App\User::$loggedIn)->first_name }}</button>
                    @else
                        <button class="button"> Login </button>
                    @endif
                </form>    
            </div>

            <div id="links-table">
                <table>
                    <tr>
                        <td>
                            @if (\App\User::$loggedIn)
                                <a href="/tickets" class="links">Tickets</a>
                                <a href="/comments" class="links">Comments</a>
                                <a href="/states" class="links">States</a>
                                <a href="/users" class="links">Users</a>
                            @else
                                <a href="/contact" class="links">Contact</a>
                                <a href="/faq" class="links">FAQ</a>
                                <a href="/about-us" class="links">About Us</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
       <div class="content">
            @yield('content')
        </div> 
        
        

        <div id="footer-wrap">
            <footer id="footer">
                <a href="/about-us" style="text-decoration: none"> <h2 id="logo" style="color: white">Asseco</h2></a>
            </footer>
        </div>
    </body>
</html>
