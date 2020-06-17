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
                    @guest
                        <button class="button"> Login </button>
                    @else
                        <button class="button">{{ Auth::user()->first_name }}</button>
                    @endguest
                </form>    
            </div>

            <div id="links-table">
                <table>
                    <tr>
                        <td>
                            @guest
                                <a href="/find-your-ticket" class="links">Find your ticket!</a>
                                <a href="/contact" class="links">Contact</a>
                                <a href="/faq" class="links">FAQ</a>
                                <a href="/about-us" class="links">About Us</a>
                            @else
                                <a href="/tickets" class="links">Tickets</a>
                                <a href="/comments" class="links">Comments</a>
                                <a href="/states" class="links">States</a>
                                <a href="/users" class="links">Users</a>
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
