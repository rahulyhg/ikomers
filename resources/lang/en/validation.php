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

    'accepted'             => 'Atribut: harus diterima. ',
    'active_url'           => 'Atribut: bukan URL yang valid.',
    'after'                => 'Atribut: harus tanggal setelah: tanggal.',
    'after_or_equal'       => 'Atribut: harus berupa tanggal setelahnya atau sama dengan: tanggal. ',
    'alpha'                => 'Atribut: hanya dapat berisi huruf. ',
    'alpha_dash'           => 'Atribut: hanya dapat berisi huruf, angka, dan tanda hubung.',
    'alpha_num'            => 'Atribut: hanya dapat berisi huruf dan angka.',
    'array'                => 'Atribut: harus berupa array.',
    'before'               => 'Atribut: harus tanggal sebelum: tanggal. ',
    'before_or_equal'      => 'Atribut: harus tanggal sebelum atau sama dengan: tanggal.',
    'between'              => [
        'numeric' => 'Atribut: harus antara: min dan: maks.',
        'file'    => 'Atribut: harus antara: min dan: maks kilobyte.',
        'string'  => 'Atribut: harus antara: min dan: karakter maks.',
        'array'   => 'Atribut: harus memiliki antara: min dan: item maks.',
    ],
    'boolean'              => 'The :bidang atribut harus benar atau salah. ',
    'confirmed'            => 'The :konfirmasi atribut tidak cocok. ',
    'date'                 => 'The :atribut bukan tanggal yang valid. ',
    'date_format'          => 'The :atribut tidak cocok dengan format: format.',
    'different'            => 'The :atribut dan: lainnya harus berbeda.',
    'digits'               => 'The :atribut harus: digit digit.',
    'digits_between'       => 'The :atribut harus antara: min dan: digit maksimal.',
    'dimensions'           => 'The :atribut memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'The :bidang atribut memiliki nilai duplikat. ',
    'email'                => 'The :atribut harus berupa alamat email yang valid. ',
    'exists'               => 'Yang dipilih: Atribut tidak valid. ',
    'file'                 => 'The :atribut harus berupa file. ',
    'filled'               => 'The :bidang atribut harus memiliki nilai. ',
    'image'                => 'The :atribut harus berupa gambar. ',
    'in'                   => 'Yang dipilih :Atribut tidak valid.',
    'in_array'             => 'The :bidang atribut tidak ada di: lainnya. ',
    'integer'              => 'The :atribut harus berupa bilangan bulat. ',
    'ip'                   => 'The :atribut harus berupa alamat IP yang valid. ',
    'ipv4'                 => 'The :atribut harus alamat IPv4 yang valid. ',
    'ipv6'                 => 'The :atribut harus berupa alamat IPv6 yang valid. ',
    'json'                 => 'The :atribut harus berupa string JSON yang valid. ',
    'max'                  => [
        'numeric' => 'The :atribut mungkin tidak lebih besar dari: maks.',
        'file'    => 'The :atribut mungkin tidak lebih besar dari: maks kilobyte.',
        'string'  => 'The :atribut mungkin tidak lebih besar dari: karakter maks.',
        'array'   => 'The :atribut mungkin tidak memiliki lebih dari: item maks.',
    ],
    'mimes'                => 'The :atribut harus berupa file bertipe: :nilai.',
    'mimetypes'            => 'The :atribut harus berupa file bertipe: :nilai.',
    'min'                  => [
        'numeric' => 'The :atribut harus paling tidak: min.',
        'file'    => 'The :atribut paling tidak harus: min kilobyte.',
        'string'  => 'The :atribut minimal harus: karakter min.',
        'array'   => 'The :atribut harus memiliki setidaknya: item min.',
    ],
    'not_in'               => 'Yang dipilih :atribut tidak valid.',
    'numeric'              => 'The :atribut harus berupa angka.',
    'present'              => 'The :bidang atribut harus ada.',
    'regex'                => 'The :format atribut tidak valid.',
    'required'             => 'The :bidang atribut diperlukan.',
    'required_if'          => 'The :bidang atribut diperlukan ketika: lainnya adalah: nilai. ',
    'required_unless'      => 'The :bidang atribut diperlukan kecuali: yang lain ada di: nilai. ',
    'required_with'        => 'The :bidang atribut diperlukan ketika: nilai hadir. ',
    'required_with_all'    => 'The :bidang atribut diperlukan ketika: nilai hadir. ',
    'required_without'     => 'The :bidang atribut diperlukan saat: nilai tidak ada. ',
    'required_without_all' => 'The :bidang atribut diperlukan ketika tidak ada: nilai ada. ',
    'same'                 => 'The :atribut dan: lainnya harus cocok. ',
    'size'                 => [
        'numeric' => 'The :atribut harus: ukuran. ',
        'file'    => 'The :atribut harus: ukuran kilobyte.',
        'string'  => 'The :atribut harus: karakter ukuran.',
        'array'   => 'The :atribut harus mengandung: item ukuran.',
    ],
    'string'               => 'The :atribut harus berupa string.',
    'timezone'             => 'The :atribut harus merupakan zona yang valid.',
    'unique'               => 'The :atribut sudah diambil.',
    'uploaded'             => 'The :atribut gagal diunggah.',
    'url'                  => 'The :format atribut tidak valid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
