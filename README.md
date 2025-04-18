# de.civiservice.show-ratings-tab

Fügt zusätliche Schalter der CiviCase Fallansicht hinzu. Mit dieser Extension wird aktuell ein Schalter hinzugefügt namens 'Zeige hinterlegte Bewertungen', welche auf das Afform `afsearchBewertungenProFall` verweist. Die Extension hat keine Konfigurationsseite, so dass im Backend keine zusätzlichen Schalter hinzugefügt werden können. Im folgenden gibt es jedoch eine kurze Anleitung, wie durch Modifikation des Codes zusätzliche Schalter hinzugefügt werden können.

## Grundlegende Funktionsweise

Im Skript `show_ratings_tabs.php` wird mit Hilfe der CiviCRM Hook `alterContent` zusätzliches Inhalt in einen Seitenaufruf hinzugefügt, wenn es sich bei der aufgerufenen Seite um eine Fallansicht handelt und die Nutzer*in die richtigen Berechtigungen hat (`access all cases and activities`). Wenn diese Bedingungen erfüllgt sind, wird die Template-Datei `templates/CRM/ShowRatingsTab/CasePageTab.tpl` hinzugefügt. Im folgenden ein kurzer Überblick, was in dieser Datei passiert:
* In dieser Datei wird in Zeile 3 ein HTML-Link angelegt
```php
<a id="showRatingsTab" class="crm-hover-button action-item no-popup" href={crmURL p="civicrm/bewertungen-anzeigen#?id=`$caseId`"} target='_blank'><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;{ts}Zeige hinterlegte Bewertungen{/ts}</a> 
``` 
* In Zeile 8 wird nun dieser Link mit Hilfe seiner ID in einer JavaScript Variablen namens `showRatingTab` gespeichert
```php
let showRatingsTab = CRM.$('#showRatingsTab').detach();
```
* In Zeile 9 wird der Link über die JavaScript-Variable an der richtigen Stelle der Seite hinterlegt
```php
CRM.$('div.case-control-panel').children('div').eq(1).children('p').first().append(showRatingsTab);
```

## Zusätzliche Schalter hinzufügen
Wir müssen nun die obigen Schritte reproduzieren, um einen neuen Button hinzuzufügen.
1. Wir definieren einen neuen Link, welche auf die Seite verweist, die wir gerne als Schalter hinterlegen wollen. Hierbei ist es wichtig, dass diesem neuen Link eine ID gegeben wird, über welche wir eindeutig auf diesen Link verweisen können bspw.
```html
<a id='myNewButtonId' class="crm-hover-button action-item no-popup" href={crmURL p="civicrm/my-new-site#?id=`$caseId`&cid=`$contactId`"} target='_blank'>Name meines neuen Schalters</a>
```
Einige Zusatzinfos
* wenn man aus der css-Klasse `no-popup` ein `popup` macht, wird die referenzierte Seite als Popup dargestellt. Aktuell gibt es jedoch noch Darstellungsprobleme mit Popup-Fenstern und URL-Parameter scheinen nicht zu funktioineren.
* Alle Parameter in der URL nach `#?` sind URL-Parameter. In der aktuellen Fassung der Extension steht als URL-Parameter die Fall-ID und die Kontakt-ID zur Verfügung. Diese können mit Hilfe von `$caseId` und `$contactId` hinzugefügt werden.
2. Wir müssen den neuen Schalter in einer neuen JavaScript Variablen speicher, bpsw.
```js
let myNewButton = CRM.${'myNewButtonId'}.detach();
```
3. Zum Schluss muss der neue Button noch an der richtigen Stelle in der Seite hinterlegt werden
```js
CRM.$('div.case-control-panel').children('div').eq(1).children('p').first().append(myNewButton);
```