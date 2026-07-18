<?php

namespace App\Support\Concerns;

trait HasLocalizedContent
{
    /**
     * Valeur du champ `{$field}_{locale}` pour la locale courante (repli sur le français).
     */
    public function localized(string $field): mixed
    {
        $locale = app()->getLocale();
        $value = $this->{"{$field}_{$locale}"} ?? null;

        return $value !== null && $value !== '' ? $value : $this->{"{$field}_fr"};
    }
}
