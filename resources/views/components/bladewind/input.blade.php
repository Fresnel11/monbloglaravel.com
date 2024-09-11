@props([
    // name of the input field for use in forms
    'name' => 'input-'.uniqid(),
    // what type of input box are you displaying
    // available options are text, password, email, search, tel
    'type' => 'text', 
    // label to display on the input box
    'label' => '',
    // should the input accept numbers only. Default is false
    'numeric' => false,
    // minimum number a user can enter when numeric=true
    'min' => null,
    // maximum number a user can enter when numeric=true
    'max' => null,
    // is this a required field. Default is false
    'required' => false,
    // adds margin after the input box
    'add_clearing' => config('bladewind.input.add_clearing', true),
    'addClearing' => config('bladewind.input.add_clearing', true),
    // placeholder text
    'placeholder' => '',
    // value to set when in edit mode or if you want to load the input with default text
    'selected_value' => '', 
    'selectedValue' => '',
    // should the placeholder always be visible even if a label is set
    // by default the label overwrites the placeholder
    // useful if you dont want this overwriting
    'show_placeholder_always' => config('bladewind.input.show_placeholder_always', false),
    'showPlaceholderAlways' => config('bladewind.input.show_placeholder_always', false),
    // message to display when validation fails for this field
    // this is just attached to the input field as a data attribute
    'error_message' => '',
    'errorMessage' => '',
    // this is an easy way to pass a translatable heading to the notification component
    // since it is triggered from Javascript, it is hard to translate any text from within js
    'error_heading' => 'Error',
    'errorHeading' => 'Error',
    // how should error messages be displayed for this input
    // by default error messages are displayed in the Bladewind notification component
    // the component should exist on the page
    'show_error_inline' => config('bladewind.input.show_error_inline', false),
    'showErrorInline' => config('bladewind.input.show_error_inline', false),
    // for numeric input only: should the numbers include dots
    'with_dots' => true,
    'withDots' => true,
    // determines if the input field has a label
    'has_label' => false,
    'hasLabel' => false,
    'is_datepicker' => false,
    'isDatepicker' => false,
    // set the prefix for the input field
    'prefix' => '',
    // set the suffix for the input field
    'suffix' => '',
    // define if prefix background is transparent
    'transparent_prefix' => config('bladewind.input.transparent_prefix', true),
    'transparentPrefix' => config('bladewind.input.transparent_prefix', true),
    // define if suffix background is transparent
    'transparent_suffix' => config('bladewind.input.transparent_suffix', true),
    'transparentSuffix' => config('bladewind.input.transparent_suffix', true),
    // force (or not) prefix to be an icon
    'prefix_is_icon' => false,
    'prefixIsIcon' => false,
    // force (or not) suffix to be an icon
    'suffix_is_icon' => false,
    'suffixIsIcon' => false,
    // define if icon prefix is outline or solid
    'prefix_icon_type' => 'outline',
    'prefixIconType' => 'outline',
    // force (or not) suffix to be an icon
    'suffix_icon_type' => 'outline',
    'suffixIconType' => 'outline',
    // should password be viewable
    'viewable' => false,
    // should field be clearable
    'clearable' => config('bladewind.input.clearable', false),
    // additional css for prefix
    'prefix_icon_css' => '',
    'prefixIconCss' => '',
    // additional css for suffix
    'suffix_icon_css' => '',
    'suffixIconCss' => '',
    // additional css for div containing the prefix
    'prefix_icon_div_css' => '',
    // additional css for div containing the suffix
    'suffix_icon_div_css' => 'rtl:!right-[unset] rtl:!left-0',
    // javascript to execute when suffix icon is clicked
    'action' => null,
    'size' => config('bladewind.input.size', 'medium'),
])
@php
    // reset variables for Laravel 8 support
    $add_clearing = filter_var($add_clearing, FILTER_VALIDATE_BOOLEAN);
    $addClearing = filter_var($addClearing, FILTER_VALIDATE_BOOLEAN);
    $show_placeholder_always = filter_var($show_placeholder_always, FILTER_VALIDATE_BOOLEAN);
    $showPlaceholderAlways = filter_var($showPlaceholderAlways, FILTER_VALIDATE_BOOLEAN);
    $show_error_inline = filter_var($show_error_inline, FILTER_VALIDATE_BOOLEAN);
    $showErrorInline = filter_var($showErrorInline, FILTER_VALIDATE_BOOLEAN);
    $with_dots = filter_var($with_dots, FILTER_VALIDATE_BOOLEAN);
    $withDots = filter_var($withDots, FILTER_VALIDATE_BOOLEAN);
    $has_label = filter_var($has_label, FILTER_VALIDATE_BOOLEAN);
    $hasLabel = filter_var($hasLabel, FILTER_VALIDATE_BOOLEAN);
    $is_datepicker = filter_var($is_datepicker, FILTER_VALIDATE_BOOLEAN);
    $isDatepicker = filter_var($isDatepicker, FILTER_VALIDATE_BOOLEAN);
    $transparent_prefix = filter_var($transparent_prefix, FILTER_VALIDATE_BOOLEAN);
    $transparentPrefix = filter_var($transparentPrefix, FILTER_VALIDATE_BOOLEAN);
    $transparent_suffix = filter_var($transparent_suffix, FILTER_VALIDATE_BOOLEAN);
    $transparentSuffix = filter_var($transparentSuffix, FILTER_VALIDATE_BOOLEAN);
    $prefix_is_icon = filter_var($prefix_is_icon, FILTER_VALIDATE_BOOLEAN);
    $prefixIsIcon = filter_var($prefixIsIcon, FILTER_VALIDATE_BOOLEAN);
    $suffix_is_icon = filter_var($suffix_is_icon, FILTER_VALIDATE_BOOLEAN);
    $suffixIsIcon = filter_var($suffixIsIcon, FILTER_VALIDATE_BOOLEAN);
    $required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    $numeric = filter_var($numeric, FILTER_VALIDATE_BOOLEAN);
    $viewable = filter_var($viewable, FILTER_VALIDATE_BOOLEAN);
    $clearable = filter_var($clearable, FILTER_VALIDATE_BOOLEAN);

    if (!$addClearing) $add_clearing = $addClearing;
    if ($showPlaceholderAlways) $show_placeholder_always = $showPlaceholderAlways;
    if ($showErrorInline) $show_error_inline = $showErrorInline;
    if (!$withDots) $with_dots = $withDots;
    if ($isDatepicker) $is_datepicker = $isDatepicker;
    if (!$transparentPrefix) $transparent_prefix = $transparentPrefix;
    if (!$transparentSuffix) $transparent_suffix = $transparentSuffix;
    if (!$prefixIsIcon) $prefix_is_icon = $prefixIsIcon;
    if (!$suffixIsIcon) $suffix_is_icon = $suffixIsIcon;

    if ($selectedValue !== $selected_value) $selected_value = $selectedValue;
    if ($errorMessage !== $error_message) $error_message = $errorMessage;
    if ($errorHeading !== $error_heading) $error_heading = $errorHeading;
    if ($prefixIconType !== $prefix_icon_type) $prefix_icon_type = $prefixIconType;
    if ($suffixIconType !== $suffix_icon_type) $suffix_icon_type = $suffixIconType;
    if ($prefixIconCss !== $prefix_icon_css) $prefix_icon_css = $prefixIconCss;
    if ($suffixIconCss !== $suffix_icon_css) $suffix_icon_css = $suffixIconCss;
    //--------------------------------------------------------------------

    $name = preg_replace('/[\s-]/', '_', $name);
    $required_symbol = ($label == '' && $required) ? ' *' : '';
    $is_required = ($required) ? 'required' : '';
    $placeholder_color = ($show_placeholder_always || $label == '') ? '' : 'placeholder-transparent dark:placeholder-transparent';
    $placeholder_label = ($show_placeholder_always) ? $placeholder : (($label !== '') ? $label : $placeholder);
    $with_dots = ($with_dots) ? 1 : 0;

    if($type == "password" && $viewable) {
        $suffix = 'eye';
        $suffix_icon_css = 'show-pwd';
        $action = 'togglePassword(\''.$name.'\', \'show\')';
        $suffix_is_icon = true;
    }

    if($clearable) {
        $suffix = 'x-mark';
        $suffix_is_icon = true;
        $suffix_icon_css = 'hidden cursor-pointer dark:!bg-dark-900/60 dark:hover:!bg-dark-900 !p-0.5 !rounded-full bg-gray-400 !stroke-2 hover:bg-gray-600 text-white';
    }
    if($attributes->has('readonly', 'disabled')){
        if($attributes->get('readonly') == 'false') $attributes = $attributes->except('readonly');
        if($attributes->get('disabled') == 'false') $attributes = $attributes->except('disabled');
    }
@endphp

<div class="relative w-full dv-{{$name}} @if($add_clearing) mb-4 @endif">
    <input
            {{ $attributes->class(["bw-input peer $is_required $name $placeholder_color $size"])->merge([
                'type' => $type,
                'id' => $name,
                'name' => $name,
                'value' => html_entity_decode($selected_value),
                'autocomplete' => "new-password",
                'placeholder' => $placeholder_label.$required_symbol,
            ]) }}
            @if($error_message != '')
                data-error-message="{{$error_message}}"
            data-error-inline="{{$show_error_inline}}"
            data-error-heading="{{$error_heading}}"
            @endif
    />
    @if(!empty($error_message))
        <div class="text-red-500 text-xs p-1 {{ $name }}-inline-error hidden">{{$error_message}}</div>
    @endif
    @if(!empty($label))
        <label for="{{ $name }}" class="form-label {{$size}}" onclick="dom_el('.{{$name}}').focus()">{!! $label !!}
            @if($required)
                <x-bladewind::icon name="star" class="!text-red-400 !w-2 !h-2 mt-[-2px]" type="solid"/>
            @endif
        </label>
    @endif
    @if (!empty($prefix))
        <div class="{{$name}}-prefix prefix text-sm select-none pl-3.5 pr-2 z-20 {{$prefix_icon_div_css}} text-blue-900/50 dark:text-dark-400 absolute left-0 inset-y-0 inline-flex items-center @if(!$transparent_prefix) bg-slate-100 border-2 border-slate-200 dark:border-dark-700 dark:bg-dark-900/50 dark:border-r-0 border-r-0 rounded-tl-md rounded-bl-md @endif"
             data-transparency="{{$transparent_prefix}}">
            @if($prefix_is_icon)
                <x-bladewind::icon name='{!! $prefix !!}' type="{{ $prefix_icon_type }}"
                                   class="!size-4 !stroke-2 !opacity-70 hover:!opacity-100 {{$prefix_icon_css}}"/>
            @else
                {!! $prefix !!}
            @endif</div>
        <script>positionPrefix('{{$name}}', 'blur');</script>
    @endif
    @if (!empty($suffix))
        <div class="{{$name}}-suffix suffix text-sm select-none pl-3.5 !pr-3 {{$suffix_icon_div_css}} z-20 text-blue-900/50 dark:text-dark-400 absolute right-0 inset-y-0 inline-flex items-center @if(!$transparent_suffix) bg-slate-100 border-2 border-slate-200 border-l-0 dark:border-dark-700 dark:bg-dark-900/50 dark:border-l-0 rounded-tr-md rounded-br-md @endif"
             data-transparency="{{$transparent_prefix}}">
            @if($suffix_is_icon)
                <x-bladewind::icon
                        name='{!! $suffix !!}'
                        type="{{ $suffix_icon_type }}"
                        class="!size-4 !stroke-2 !opacity-85 hover:!opacity-100 {{$suffix_icon_css}}"
                        action="{!! $action !!}"/>

                {{-- this will be shown when user clicks to reveal password // so they can hide the password --}}
                @if($type == 'password' && $viewable)
                    <x-bladewind::icon
                            name='eye-slash'
                            type="{{ $suffix_icon_type }}"
                            class="!size-4 !stroke-2 !opacity-85 hover:!opacity-100 hide-pwd hidden"
                            action="togglePassword('{{$name}}', 'hide')"/>
                @endif
            @else
                {!! $suffix !!}
            @endif
        </div>
        <script>positionSuffix('{{$name}}');</script>
    @endif
</div>
<input type="hidden" class="bw-raw-select"/>
<script>
    @if($numeric)
    dom_el('input.{{$name}}').addEventListener('keydown', (event) => {
        isNumberKey(event, {{$with_dots}});
    });
    dom_el('input.{{$name}}').setAttribute('inputmode', 'numeric');
    @if($min || $max)
    dom_el('input.{{$name}}').addEventListener('keyup', (event) => {
        checkMinMax('{{$min}}', '{{$max}}', '{{$name}}');
    });
    @endif
    @endif

    @if($clearable)
    dom_el('input.{{$name}}').addEventListener('keyup', (event) => {
        makeClearable('{{$name}}');
    });
    @endif
</script>
