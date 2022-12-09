<p>Rate: {{ ($entry->clientRate)?($entry->clientRate->rate):__('general.notRated') }}</p>
<p>Note: {{ ($entry->clientRate)?((strlen($entry->clientRate->note)>1)?$entry->clientRate->note:__('general.notNote')):__('general.notNote') }}</p>
