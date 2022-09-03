<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Illuminate\Support\Collection;

class CallSummaryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return CallChecklistForShojon::select('agent', 'created_at', 'customer_sec','call_started',  'call_ended','phone_number', 'caller_name', 'sex','age','occupation', 'socio_economic_status', 'location', 'hearing_source', 'is_recordable', 'call_type', 'caller', 'service', 'pre_mood_rating', 'main_reason_for_calling', 'secondary_reason_for_calling', 'mental_illness_diagnosis', 'suicidal_risk', 'post_mood_rating', 'call_effectivenes', 'client_referral', 'ref_client_name','ref_age', 'ref_therapy_reason','ref_phone_number','ref_preferred_time','ref_emergency_number','ref_financial_affort','ref_therapist_preference', 'caller_description')
        //->get();
        return new Collection($this->data);
    }

    public function headings(): array
    {
        return [
            'calldate',
            'total_in',
            'total_out',
            'success_in',
            'success_out',
            'abandoned_in',
            'unsuccessful_out',
            'queue_drop',
            'ivr_drop',
            'total_talk_in',
            'avg_talk_in',
            'total_talk_out',
            'avg_talk_out',
            'total_queue_time',
            'queue_count',
            'avg_queue_time',

        ];
    }
}
