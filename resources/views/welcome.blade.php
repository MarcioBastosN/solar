<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Solar - Paula Silva
    </title>
    <meta name="description" content="Solar project - Paula Silva" />
    <meta name="keywords" content="Paula-silva placa-solar" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- style="font-family: 'Source Sans Pro', sans-serif;" --}}

<body class="leading-normal tracking-normal text-gray-200 bg-primary font-Poppins font-medium">
    <!--Nav-->

    <nav class="bg-primary border-gray-200 m-auto md:w-10/12 w-full">
        <div class=" flex flex-wrap items-center justify-between  py-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('logo.png') }}" class="h-8" alt="paula seilva" />
                <img src="{{ asset('text_paula.png') }}" class="h-8" alt="paula seilva" />
                <img src="{{ asset('text_silva.png') }}" class="h-8" alt="paula seilva" />
                {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Paula Silva</span> --}}
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg
                    md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto text-white" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4
                        border border-gray-100 rounded-lg
                        bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0
                        md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                            md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                            dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Quem
                            somos</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                            md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                            dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Depoimentos</a>
                    </li>
                    <li>

                        <a href="#"
                            class=" flex flex-row text-center py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                                md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                                dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            <img src="{{ asset('ico_login.png') }}" class="max-h-4 mr-1 align-middle"
                                alt="paula seilva" />
                            Login</a>
                    </li>
                    <li>
                        <a
                            href="https://api.whatsapp.com/send?phone=559381009539&text=Ola%20Paula%20Silva,%20gostaria%20de%20solicitar%20um%20projeto">
                            <button class='rounded-md px-2 bg-[#CC7115]'>Registre-se</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- inicio apresentação --}}
    <div class="relative  h-[600px] w-screen bg-primary">
        <img src="{{ asset('LP 800 - Paula Silva 1.png') }}" alt="Imagem" class="absolute h-full w-full object-cover">
        <div class="m-auto md:w-10/12">
            <div class="absolute top-1/4 py-4  bg-transparent max-w-xl text-white">
                <h1 class="text-6xl font-bold">Simplifique suas homologações com a gente!</h1>
                <p class="pt-4 max-w-md mt-4">
                    Economize tempo para investir na aquisição de novos clientes. Deixe a parte complicada comigo e
                    minha
                    equipe.
                </p>
                <button
                    class='rounded-md p-4 font-semibold mt-4 bg-gradient-to-l from-btn_color_inicio to-btn_color_fim'>Iniciar
                    homologação agora!</button>
            </div>
        </div>
    </div>


    {{-- formaçoes e cursos --}}
    <section class="bg-secondary py-16">

        <div class="m-auto md:w-10/12 w-full bg-primary text-center rounded-xl ">
            <p class=" py-12 px-28 ">Sei que você, empresário do setor de energia solar,
                enfrenta desafios únicos. As regulamentações em constante mudança e a burocracia podem ser frustrantes.
                Estamos aqui para facilitar esse processo para você.</p>
        </div>

        <div class='m-auto md:w-10/12 w-full text-center my-12'>
            <h2 class="w-full text-4xl font-bold  text-center ">
                Contratando nossos serviços você terá:
            </h2>
        </div>

        <div class="m-auto md:w-10/12 w-full ">
            <div class="flex md:flex-nowrap flex-wrap flex-row flex-grow gap-4">
                <div class="w-full sm:w-1/3 bg-primary text-center py-12 px-2 rounded-2xl ">
                    <img src="{{ asset('clock.png') }}" alt="" class="max-w-max mx-auto justify-center">
                    <p class="mt-4 mx-2  text-[16px]">Homologações rápidas e eficientes.</p>
                </div>
                <div class="w-full sm:w-1/3 bg-primary text-center py-12 px-2 rounded-2xl ">
                    <img src="{{ asset('shilde.png') }}" alt="" class="max-w-max mx-auto justify-center">
                    <p class="mt-4 mx-1  text-[16px]">Grantia de conformidade com todas as regulamentações.</p>
                </div>
                <div class="w-full sm:w-1/3 bg-primary text-center py-12 px-2 rounded-2xl ">
                    <img src="{{ asset('Potencial.png') }}" alt="" class="max-w-max mx-auto justify-center">
                    <p class="mt-4 mx-1  text-[16px]">Aproveitamento máximo do potencial solar.</p>
                </div>
                <div class="w-full sm:w-1/3 bg-primary text-center py-12 px-2 rounded-2xl ">
                    <img src="{{ asset('Comrpomisso.png') }}" alt=""
                        class="max-w-max mx-auto justify-center mt-5">
                    <p class="mt-7 mx-2  text-[16px]">Total compromisso com sua satisfação</p>
                </div>
            </div>
        </div>
    </section>

    {{-- timeline --}}
    <section class="bg-primary py-32">
        <div class="container m-auto md:w-10/12 w-full">
            <h2 class="w-full text-4xl font-bold text-center ">
                Simplificamos o processo par sua comodidade!
            </h2>
        </div>
        <div class="m-auto md:w-10/12 w-full">
            {{-- timeline --}}
            <p>aqui vem a timeline</p>
        </div>

    </section>

    <!--Footer-->
    <footer class="bg-secondary py-32">
        <div class="container mx-auto px-8">
            <p class="text-6xl text-center font-extrabold mt-16 mb-6">DEIXE SEU EMAIL</p>
            <p class="mx-12 mb-6 text-2xl text-center font-medium">Deixe seu e-mail para que possamos entrar
                em contato e melhor lhe atender
            </p>
            <div class="">
                <form action="" method="post" class="text-center">
                    @csrf
                    <input type="text" name="email" class="rounded-sm md:w-96 mx-auto">
                    <button type="submit" class="-ml-1 bg-secondary rounded-sm px-6 py-2  font-bold">Email</button>
                </form>
            </div>
        </div>
    </footer>
    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
                    /*Apply classes for slide in bar*/
                    scrollpos = window.scrollY;

                    if (scrollpos > 10) {
                        header.classList.add("bg-white");
                        navaction.classList.remove("bg-white");
                        // navaction.classList.add("gradient");
                        navaction.classList.remove("text-gray-800");
                        navaction.classList.add(");
                                //Use to switch toggleColour colours
                                for (var i = 0; i < toToggle.length; i++) {
                                    toToggle[i].classList.add("text-gray-800");
                                    toToggle[i].classList.remove(");
                                    }
                                    header.classList.add("shadow");
                                    navcontent.classList.remove("bg-gray-100");
                                    navcontent.classList.add("bg-white");
                                } else {
                                    header.classList.remove("bg-white");
                                    // navaction.classList.remove("gradient");
                                    navaction.classList.add("bg-white");
                                    navaction.classList.remove(");
                                        navaction.classList.add("text-gray-800");
                                        //Use to switch toggleColour colours
                                        for (var i = 0; i < toToggle.length; i++) {
                                            toToggle[i].classList.add(");
                                                toToggle[i].classList.remove("text-gray-800");
                                            }

                                            header.classList.remove("shadow");
                                            navcontent.classList.remove("bg-white");
                                            navcontent.classList.add("bg-gray-100");
                                        }
                                    });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
