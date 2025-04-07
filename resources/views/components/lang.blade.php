@php
    $locale = substr(app()->getLocale(), 0, 2);

    $flagMap = [
        'en' => 'gb',     // 🇬🇧 English (UK)
        'it' => 'it',     // 🇮🇹 Italiano
        'es' => 'es',     // 🇪🇸 Español
        'fr' => 'fr',     // 🇫🇷 Français
        'de' => 'de',     // 🇩🇪 Deutsch
        'pt' => 'pt',     // 🇵🇹 Português
        'ro' => 'ro',     // 🇷o Rumeno
        'zh' => 'cn',     // 🇨🇳 中文 (Cina)
        'ja' => 'jp',     // 🇯🇵 日本語
        'ko' => 'kr',     // 🇰🇷 한국어
        'ar' => 'sa',     // 🇸🇦 العربية (Arabia Saudita)
        'tr' => 'tr',     // 🇹🇷 Türkçe
    ];

    $flag = $flagMap[$locale] ?? 'un'; // fallback: bandiera ONU (o altro default)
@endphp

    <!-- Bottone fisso in basso a sinistra con la bandiera della lingua corrente -->
    <div class="position-fixed bottom-0 start-0 mb-4 ms-4">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#languageModal">
        <span class="flag-icon flag-icon-{{ $flag }} me-2" style="width: 40px; height: 30px; border-radius: 5px;"></span>
    </button>
</div>





    <!-- Finestra Modale per la selezione della lingua -->
    <!-- Finestra Modale per la selezione della lingua -->
    <div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="languageModalLabel">Seleziona la lingua</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <!-- Colonna 1: Lingue principali -->
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'en']) }}"><x-_locale
                        lang="en" /> English</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'it']) }}"><x-_locale
                        lang="it" /> Italiano</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'es']) }}"><x-_locale
                        lang="es" /> Español</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'fr']) }}"><x-_locale
                        lang="fr" /> Français</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'de']) }}"><x-_locale
                        lang="de" /> Deutsch</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'pt']) }}"><x-_locale
                        lang="pt" /> Português</a></li>
                </ul>
              </div>

              <!-- Colonna 2: Lingue extra -->
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ro']) }}"><x-_locale
                        lang="ru" /> Русский</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'zh']) }}"><x-_locale
                        lang="zh" /> 中文</a></li>
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ja']) }}"><x-_locale
                        lang="ja" /> 日本語</a></li> <!-- Giapponese -->
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ko']) }}"><x-_locale
                        lang="ko" /> 한국어</a></li> <!-- Coreano -->
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ar']) }}"><x-_locale
                        lang="ar" /> العربية</a></li> <!-- Arabo -->
                  <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'tr']) }}"><x-_locale
                        lang="tr" /> Türkçe</a></li> <!-- Turco -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>