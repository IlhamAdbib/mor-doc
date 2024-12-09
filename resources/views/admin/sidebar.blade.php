<div class="sidebar p-20 bg-white p-relative" style="background-color:black;">
            <!--<h3 class="p-relative txt-c mt-0">Admin</h3>-->
            <ul>
                <li>
                    <a class="{{'redirect'==request()->path()? 'active' : ''}} d-flex df-align-center fs-14 c-black rad-6 p-10" href="{{url('redirect')}}">
                        <!--<i class="fa-regular fa-chart-bar fa-fw"></i>-->
                        <i class="fas fa-home fa-fw" style="color: grey;"></i>
                        <span class="hide-in-mobile" style="color: grey; font-weight:bold; font-size:15px;">TABLEAU DE BORD</span>
                    </a>
                </li>
                <br><br><br>
                <li>
                    <a class="{{'view_demandes'==request()->path()? 'active' : ''}} d-flex df-align-center fs-14 c-black rad-6 p-10" href="{{url('view_demandes')}}">
                        <i class="fas fa-download fa-fw" style="color: grey;"></i>
                        <!--<i class="fa-solid fa-gear"></i>-->
                        <span class="hide-mobile" style="color: grey; font-weight:bold; font-size:15px;">DEMANDES RECUS </span>
                    </a>
                </li>
                <br><br><br>
                <li>
                    <a class="{{'historique'==request()->path()? 'active' : ''}} d-flex df-align-center fs-14 c-black rad-6 p-10" href="{{url('historique')}}">
                        <i class="fas fa-search fa-fw" style="color: grey;"></i>
                        <!--<i class="fa-solid fa-clock-rotate-left"></i>-->
                        <span class="hide-mobile" style="color: grey; font-weight:bold; font-size:15px;">HISTORIQUE DES DEMANDES</span>
                    </a>
                </li>
                <br><br><br>
                <li>
                    <a class="{{'historique'==request()->path()? 'active' : ''}} d-flex df-align-center fs-14 c-black rad-6 p-10" href="{{url('reclam')}}">
                        <i class="fas fa-box fa-fw" style="color: grey;"></i>
                        <!--<i class="fa-solid fa-clock-rotate-left"></i>-->
                        <span class="hide-mobile" style="color: grey; font-weight:bold; font-size:15px;">RECLAMATIONS RECUS</span>
                    </a>
                </li>
                <br><br><br>
                <li>
                    <a class="d-flex df-align-center fs-14 c-black rad-6 p-10" href="/out">
                        <i class="fas fa-arrow-right fa-fw" style="color: grey;"></i>    
                        <!--<i class="fa-solid fa-right-from-bracket"></i>-->
                        <span class="hide-mobile" style="color: grey; font-weight:bold; font-size:15px;">LOG OUT</span>
                    </a>
                </li>
            
        </ul>
</div>

