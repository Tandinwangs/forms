Bhutan National Bank Limited

Your form : {{$form->code}} submitted to the Bank has been : {{$form->status}} 

@if($form->status == 'rejected')
  Because {{$form->reasonforrejection}}
@endif