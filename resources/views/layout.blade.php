<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css\layout.css') }} " rel="stylesheet" type="text/css"/>
        <title>My Ticketing system!</title>
    </head>
    <body style="background-color: rgb(213, 215, 216)">
        <div id="layout-header">
           <a href="/about-us" style="text-decoration: none"> <h2 class="top-right" style="color: white">Asseco</h2> </a>
            <div class="title m-b-md">
               The "Ticketing system"
            </div>

            <div id="links-table">
                <table>
                    <tr>
                        <td>
                            <a href="/tickets/submit-a-ticket" class="links">Submit a ticket!</a>
                            <a href="/contact" class="links">Contact</a>
                            <a href="/faq" class="links">FAQ</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
      
        @yield('content')
        
        <div id="page-container">
            <div id="content-wrap">
                <footer id="footer">

                </footer>
            </div>
        </div>
    </body>
</html>
