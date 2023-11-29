<div>

    <!--Nav-->

    <nav class="bg-primary border-gray-200 m-auto sm:w-10/12 w-full" id="menu">
        <div class=" flex flex-wrap items-center justify-between  py-4">
            <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse ">
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
            <div class="hidden w-full md:block md:w-auto sm:text-white text-primary" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4
                            border border-gray-100 rounded-lg
                            bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0
                            md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#inicio" class="block py-2 px-3 rounded md:bg-transparent md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#video"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                                md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                                dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Quem
                            somos</a>
                    </li>
                    <li>
                        <a href="#depoimentos"
                            class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                                md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                                dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Depoimentos</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            @hasallroles('user')
                                <li>
                                    <a href="{{ route('cliente.home') }}"
                                        class="font-semibold hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Minha
                                        area</a>
                                </li>
                            @endhasallroles

                            @hasallroles('admin')
                                <li>
                                    <a href="{{ route('admin.clientes') }}"
                                        class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                                        md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                                        dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                                </li>
                            @endhasallroles
                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0
                                md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                                dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Log in</a>
                            </li>
                        @endauth
                    @endif

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
    <div class="relative  sm:h-[600px] h-[400px] w-screen bg-primary" id="inicio">
        <img src="{{ asset('LP 800 - Paula Silva 1.png') }}" alt="Imagem" class="absolute h-full w-full object-cover">
        <div class="m-auto md:w-10/12">
            <div
                class="absolute top-1/4 py-4 pl-4 pr-24 max-w-md text-white
                    sm:bg-transparent sm:max-w-xl sm:py-4 sm:px-0 sm:top-1/4">
                <h1 class="sm:text-6xl text-2xl font-bold">Simplifique suas homologações com a gente!</h1>
                <p class="pt-4 max-w-md mt-4">
                    Economize tempo para investir na aquisição de novos clientes. Deixe a parte complicada comigo e
                    minha
                    equipe.
                </p>
                <a href="{{ route('register') }}">
                    <button
                        class='rounded-md sm:p-4 p-2 sm:text-base text-sm font-semibold mt-4
                            bg-gradient-to-l from-btn_color_inicio to-btn_color_fim'>Iniciar
                        homologação agora!</button>
                </a>
            </div>
        </div>
    </div>

    {{-- formaçoes e cursos --}}
    <section class="bg-secondary py-16" id="cursos">

        <div class="m-auto md:w-10/12 w-full bg-primary text-center rounded-xl ">
            <p class="py-12 sm:px-28 px-4">Sei que você, empresário do setor de energia solar,
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
    <section class="bg-primary py-16 sm:p-0 px-2" id='timeline'>
        <div class="container m-auto sm:w-10/12 w-full">
            <h2 class="w-full text-4xl font-bold text-center my-16">
                Simplificamos o processo par sua comodidade!
            </h2>
        </div>
        <div class="m-auto sm:w-10/12 w-full sm:text-base text-xs">
            {{-- superior --}}
            <div class="grid grid-cols-6 gap-2">
                <div class="  text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1sm:text-[16px] text-[12px]">Solicitação de parecer de
                            acesso.</p>
                    </div>
                </div>
                <div class=" text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class="  text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1 sm:text-[16px] text-[12px]">Elaboração do projeto.</p>
                    </div>
                </div>
                <div class="  text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class="  text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1 sm:text-[16px] text-[12px]">Solicitação de vistoria.</p>
                    </div>
                </div>
                <div class="  text-center rounded-2xl ">
                    {{--  --}}
                </div>
            </div>
            {{-- dot-super --}}
            <div class="grid grid-cols-6 gap-2">
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2">*</p>
                </div>
                <div class=" text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2">*</p>
                </div>
                <div class="  text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2">*</p>
                </div>
                <div class="  text-center rounded-2xl ">
                    {{--  --}}
                </div>
            </div>
            {{-- centro --}}
            <div
                class="grid grid-cols-6 gap-2 rounded-2xl py-2 font-semibold
                        bg-gradient-to-l from-btn_color_fim to-btn_color_inicio text-center">
                <div>Etapa 1</div>
                <div>Etapa 2</div>
                <div>Etapa 3</div>
                <div>Etapa 4</div>
                <div>Etapa 5</div>
                <div>Etapa 6</div>
            </div>
            {{-- baixo --}}
            {{-- dot-under --}}
            <div class="grid grid-cols-6 gap-2">
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2 ">*</p>
                </div>
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2">*</p>
                </div>
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class=" grid grid-rows-2 text-center">
                    <p class="text-white font-bold mt-2">*</p>
                </div>

            </div>
            {{-- under --}}
            <div class="grid grid-cols-6 gap-2">
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class="text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1 sm:text-[16px] text-[12px]">Análise da documentação enviada e
                            emissão de
                            ART.</p>
                    </div>
                </div>
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class="text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1 sm:text-[16px] text-[12px]">Envio de solicitação de parecer de
                            acesso para
                            a
                            concessionária.</p>
                    </div>
                </div>
                <div class="text-center rounded-2xl ">
                    {{--  --}}
                </div>
                <div class="text-center">
                    <div class=" bg-secondary text-center rounded-2xl sm:p-6 p-1">
                        <p class="sm:mt-4 sm:mx-2 m-1 sm:text-[16px] text-[12px]">Conclusão do projeto.</p>
                    </div>
                </div>

            </div>
        </div>

    </section>

    {{-- video --}}
    <section class="bg-secondary py-16" id="video">
        <div class="container m-auto md:w-10/12 w-full">
            <h2 class="w-full text-4xl font-bold text-center my-16 sm:px-[22rem] px-4">
                Conheça um pouco mais sobre mim e minha equipe
            </h2>
        </div>
        <div class="m-auto sm:w-10/12 w-full">
            <img src="{{ asset('Rectangle 17.png') }}" alt="Imagem"
                class="sm:w-2/4 sm:h-2/4 w-10/12 h-10/12 m-auto">
        </div>
    </section>

    {{-- depoimentos --}}
    <section class="bg-primary py-16" id="depoimentos">
        <div class="container m-auto md:w-10/12 w-full">
            <h2 class="w-full text-4xl font-bold text-center my-16 m-auto sm:mx-4">
                Veja o que nossos clientes tem a dizer
            </h2>
        </div>
        <div class="m-auto sm:w-10/12 w-full">
            <div class="m-auto md:w-10/12 w-full ">
                <div class="flex md:flex-nowrap flex-wrap flex-row flex-grow gap-4">
                    <div
                        class="w-full sm:w-1/3 bg-gray-300 sm-w-10/12 sm:h-[300px] h-[400px] text-center py-12 px-2 rounded-2xl ">
                        {{-- <img src="{{ asset('clock.png') }}" alt="" class="max-w-max mx-auto justify-center"> --}}
                        {{-- <p class="mt-4 mx-2  text-[16px]">Homologações rápidas e eficientes.</p> --}}
                    </div>
                    <div
                        class="w-full sm:w-1/3 bg-gray-300 sm-w-10/12 sm:h-[300px] h-[400px] text-center py-12 px-2 rounded-2xl ">
                        {{-- <img src="{{ asset('shilde.png') }}" alt=""
                                class="max-w-max mx-auto justify-center">
                            <p class="mt-4 mx-1  text-[16px]">Grantia de conformidade com todas as regulamentações.</p> --}}
                    </div>
                    <div
                        class="w-full sm:w-1/3 bg-gray-300 sm-w-10/12 sm:h-[300px] h-[400px] text-center py-12 px-2 rounded-2xl ">
                        {{-- <img src="{{ asset('Potencial.png') }}" alt=""
                                class="max-w-max mx-auto justify-center">
                            <p class="mt-4 mx-1  text-[16px]">Aproveitamento máximo do potencial solar.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <footer class="bg-secondary py-16" id="cadastrar">
        <div class="container m-auto md:w-10/12 w-full">
            <p class="text-4xl text-center font-extrabold mt-16 mb-4">Pronto para simplificar suas homologações?</p>
            <div class="container m-auto md:w-10/12 w-full">
                <p class="mb-16 mt-2 text-lg text-center sm:px-[22rem] px-4">Agende uma consulta gratuita comigo e
                    desbloqueie
                    todo o potencial solar de seus projetos.
                </p>
            </div>
            <div class="container m-auto md:w-1/2 w-full">
                <form wire:submit.prevent class="text-center flex flex-col">
                    @csrf
                    <div class="flex flex-col my-2">
                        <span class="text-start">Nome</span>
                        <input type="text" wire:model='name' class="rounded-md md:w-full mx-auto text-primary">
                    </div>
                    <div class="flex flex-col my-1">
                        <span class="text-start">Email</span>
                        <input type="text" wire:model='email' class="rounded-md md:w-full mx-auto text-primary">
                    </div>
                    <a href="">
                        <button wire:click='redirectCadastro'
                            class='rounded-md sm:px-8 sm:py-4 p-2 sm:text-base text-sm font-semibold mt-4
                                bg-gradient-to-l from-btn_color_inicio to-btn_color_fim'>
                            Desbloquear potencial solar!</button>
                    </a>
                </form>
            </div>
        </div>
        <div class="container m-auto md:w-1/3 w-full text-center mt-16 mb-4">
            <div class="mx-auto flex flex-row gap-4 justify-center my-2">
                <a href="">
                    <img src="{{ asset('insta_ico.png') }}" class="h-8" alt="instagram" />
                </a>
                <a href="">
                    <img src="{{ asset('face_ico.png') }}" class="h-8" alt="facebook" />
                </a>
            </div>
            <p class='font-bold'>Paula Silva | Todos os direitos reservados.</p>
        </div>
    </footer>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
