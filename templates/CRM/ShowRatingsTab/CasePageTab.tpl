{crmScope extensionKey='de.civiservice.show-ratings-tab'}

<a id="showRatingsTab" class="crm-hover-button action-item no-popup" href={crmURL p="civicrm/bewertungen-anzeigen#?id=`$caseId`"} target='_blank'><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;{ts}Zeige hinterlegte Bewertungen{/ts}</a> 

<script type="text/javascript">
  {literal}
  CRM.$(function() {
    let showRatingsTab = CRM.$('#showRatingsTab').detach();
    CRM.$('div.case-control-panel').children('div').eq(1).children('p').first().append(showRatingsTab);
  });
  {/literal}
</script>
{/crmScope}
