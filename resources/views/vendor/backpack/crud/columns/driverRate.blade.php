<p>Rate: {{ ($entry->driverRate)?($entry->driverRate->rate):__('general.notRated') }}</p>
<p>Note: {{ ($entry->driverRate)?((strlen($entry->driverRate->note)>1)?$entry->driverRate->note:__('general.notNote')):__('general.notNote') }}</p>
