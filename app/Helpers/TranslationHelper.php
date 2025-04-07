<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationHelper
{
    /**
     * Traduci le stringhe mancanti per tutti i file in una lingua.
     *
     * @param string $locale La lingua di destinazione (es. 'it', 'es')
     * @return void
     */
    public static function translateMissingStrings($locale)
    {
        $langPath = resource_path('lang');

        $sourceLangDir = $langPath . '/en';
        $targetLangDir = $langPath . '/' . $locale;

        if (!is_dir($sourceLangDir)) {
            throw new \Exception("La cartella delle lingue inglesi non esiste!");
        }

        if (!is_dir($targetLangDir)) {
            mkdir($targetLangDir, 0755, true);
        }

        // Istanzia il traduttore
        $tr = new GoogleTranslate($locale);

        // Scorri tutti i file PHP nella cartella 'en'
        foreach (glob($sourceLangDir . '/*.php') as $sourceFilePath) {
            $filename = basename($sourceFilePath); // es. ui.php
            $targetFilePath = $targetLangDir . '/' . $filename;

            $sourceStrings = include $sourceFilePath;
            $targetStrings = file_exists($targetFilePath) ? include $targetFilePath : [];

            // Traduci solo le chiavi mancanti
            foreach ($sourceStrings as $key => $value) {
                if (!isset($targetStrings[$key])) {
                    // Traduzione automatica
                    $translatedValue = $tr->translate($value);
                    $targetStrings[$key] = $translatedValue;

                    echo "[{$filename}] Tradotto '$key' ➜ $translatedValue\n";
                }
            }

            // Salva il file tradotto
            file_put_contents($targetFilePath, '<?php return ' . var_export($targetStrings, true) . ';');
        }

        echo "✅ Traduzioni completate per la lingua: $locale\n";
    }
}
