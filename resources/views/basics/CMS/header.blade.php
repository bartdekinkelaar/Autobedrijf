<div class="col-2 cmsHeader">
    <img class="cmsLogo" src="{{ URL::asset('/img/cms_logov2.png') }}"/>
    <ul class="cmsMenu cM_main">
        <li class="cmName">
            <p>Algemeen</p>
        </li>
        <li>
            <a href="{{ route('CMS.index') }}">Home</a>
        </li>
    </ul>
    <ul class="cmsMenu cM_components">
        <li class="cmName">
            <p>Components</p>
        </li>
        <li>
            {{--<a href="{{ route('nieuw_voertuig')}}">Occasions</a>--}}
            <a href="{{ route('CMS.cars') }}">Occasions</a>
        </li>
        <li>
            <a href="{{ route('CMS.features') }}">Kenmerken</a>
        </li>
        <li>
            <a href="{{ route('CMS.forms') }}">Formulieren</a>
        </li>
        <li>
            <a href="{{ route('CMS.pages') }}">Pagina's</a>
        </li>
    </ul>
</div>