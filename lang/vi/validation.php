<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận.',
    'accepted_if' => ':attribute phải được chấp nhận khi :other là :value.',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => ':attribute chỉ được chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ được chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ được chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'ascii' => ':attribute chỉ được chứa ký tự chữ và số một byte và ký hiệu.',
    'before' => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'array' => ':attribute phải có giữa :min và :max items.',
        'file' => ':attribute phải ở giữa :min và :max kilobytes.',
        'numeric' => ':attribute phải có giữa :min và :max.',
        'string' => ':attribute phải có giữa :min và :max characters.',
    ],
    'boolean' => ':attribute trường phải đúng hoặc sai.',
    'confirmed' => ':attribute nhận đinh không phù hợp.',
    'current_password' => 'Sai mật khẩu.',
    'date' => ':attribute không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là một ngày bằng :date.',
    'date_format' => ':attribute không phù hợp với định dạng :format.',
    'decimal' => ':attribute phải có :decimal chữ số thập phân.',
    'declined' => ':attribute phải bị từ chối.',
    'declined_if' => ':attribute phải bị từ chối khi :other là :value.',
    'different' => ':attribute và :other phải khác.',
    'digits' => ':attribute cần phải có :digits chữ số.',
    'digits_between' => ':attribute phải ở giữa :min và :max chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute trường có một giá trị trùng lặp.',
    'doesnt_end_with' => ':attribute có thể không kết thúc bằng một trong những điều sau đây: :values.',
    'doesnt_start_with' => ':attribute có thể không bắt đầu với một trong những điều sau đây: :values.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong những điều sau đây: :values.',
    'enum' => ':attribute đã chọn không có hiệu lực.',
    'exists' => ':attribute đã chọn không có hiệu lực.',
    'file' => ':attribute phải là một tập tin.',
    'filled' => ':attribute trường phải có một giá trị.',
    'gt' => [
        'array' => ':attribute phải có nhiều hơn :value items.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'numeric' => ':attribute phải lớn hơn :value.',
        'string' => ':attribute phải lớn hơn :value characters.',
    ],
    'gte' => [
        'array' => ':attribute phải có :value items hoặc nhiều hơn.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value characters.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => ':attribute đã chọn không hợp lệ.',
    'in_array' => 'Trường :attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lowercase' => ':attribute phải là chữ thường.',
    'lt' => [
        'array' => ':attribute phải có ít hơn :value items.',
        'file' => ':attribute phải nhỏ hơn :value kilobytes.',
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'string' => ':attribute phải nhỏ hơn :value characters.',
    ],
    'lte' => [
        'array' => ':attribute không được có nhiều hơn :value items.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value characters.',
    ],
    'mac_address' => ':attribute phải là một địa chỉ MAC hợp lệ.',
    'max' => [
        'array' => ':attribute không được có nhiều hơn :max items.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'numeric' => ':attribute không được lớn hơn :max.',
        'string' => ':attribute không được lớn hơn :max characters.',
    ],
    'max_digits' => ':attribute không được có nhiều hơn :max digits.',
    'mimes' => ':attribute phải là một tập tin loại: :values.',
    'mimetypes' => ':attribute phải là một tập tin loại: :values.',
    'min' => [
        'array' => ':attribute phải có ít nhất :min items.',
        'file' => ':attribute phải ít nhất :min kilobytes.',
        'numeric' => ':attribute phải ít nhất :min.',
        'string' => ':attribute phải ít nhất :min characters.',
    ],
    'min_digits' => ':attribute phải có ít nhất :min digits.',
    'multiple_of' => ':attribute phải là bội số của :value.',
    'not_in' => 'selected :attribute đã chọn không có hiệu lực.',
    'not_regex' => ':attribute format định dạng không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'password' => [
        'letters' => ':attribute phải chứa ít nhất một chữ cái.',
        'mixed' => ':attribute phải chứa ít nhất một chữ hoa và một chữ thường.',
        'numbers' => ':attribute phải chứa ít nhất một số.',
        'symbols' => ':attribute phải chứa ít nhất một biểu tượng.',
        'uncompromised' => ':attribute đã cho đã xuất hiện trong một vụ rò rỉ dữ liệu :attribute.',
    ],
    'present' => ':attribute trường phải có mặt.',
    'prohibited' => ':attribute lĩnh vực bị cấm.',
    'prohibited_if' => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_unless' => 'Trường :attribute bị cấm trừ khi :other trong :values.',
    'prohibits' => 'Trường :attribute cấm :other từ hiện diện.',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => 'Trường :attribute là bắt buộc.',
    'required_array_keys' => 'Trường :attribute phải chứa các mục cho: :values.',
    'required_if' => 'Trường :attribute là bắt buột khi :other là :value.',
    'required_if_accepted' => 'Trường :attribute là bắt buộc khi :other được chấp nhận.',
    'required_unless' => 'Trường :attribute là bắt buộc trừ khi :other trong :values.',
    'required_with' => 'Trường :attribute là bắt buộc khi :values là present.',
    'required_with_all' => 'Trường :attribute là bắt buộc khi :values là present.',
    'required_without' => 'Trường :attribute là bắt buộc khi :values không phải present.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không gì trong số :values là present.',
    'same' => ':attribute và :other phải phù hợp.',
    'size' => [
        'array' => ':attribute phải chứa :size items.',
        'file' => ':attribute phải chứa :size kilobytes.',
        'numeric' => ':attribute phải chứa :size.',
        'string' => ':attribute phải chứa :size characters.',
    ],
    'starts_with' => ':attribute phải bắt đầu với một trong những điều sau đây: :values.',
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là múi giờ hợp lệ.',
    'unique' => ':attribute đã được tồn tại.',
    'uploaded' => ':attribute không thể tải lên.',
    'uppercase' => ':attribute phải là chữ hoa.',
    'url' => ':attribute phải là một URL hợp lệ.',
    'ulid' => ':attribute phải là một ULID hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];