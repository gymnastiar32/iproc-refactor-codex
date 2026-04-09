<?php

return [
    'title' => 'Help us understand your procurement needs',
    'subtitle' => 'Before we reach out, let us first understand your organization\'s procurement needs. This short information helps us recommend the most suitable solution, whether it is ready-to-use iProc Cloud or a more integrated custom system.',
    'steps' => [
        'contact' => 'Contact Information',
        'assessment' => 'Needs Check',
    ],
    'contact' => [
        'title' => 'Contact Information',
        'description' => 'Used so our team can contact you after the initial assessment',
    ],
    'fields' => [
        'full_name' => [
            'label' => 'Full Name and Position <span class="text-red-600">*</span>',
            'placeholder' => 'Example: Andi Pratama - Procurement Manager',
        ],
        'company' => [
            'label' => 'Organization / Company <span class="text-red-600">*</span>',
            'placeholder' => 'Business entity or business unit name',
        ],
        'email' => [
            'label' => 'Email Address <span class="text-red-600">*</span>',
            'placeholder' => 'Use an active email for follow-up',
        ],
        'phone' => [
            'label' => 'Active WhatsApp Number <span class="text-red-600">*</span>',
            'placeholder' => 'Used for quick coordination',
        ],
        'request' => [
            'label' => 'Initial Request <span class="text-gray-500">(optional)</span>',
            'placeholder' => 'Please describe your needs in detail.',
        ],
        'other_need' => [
            'label' => 'Describe your other needs <span class="text-red-600">*</span>',
            'placeholder' => 'Example: SAP/ERP integration, budget control, approval SLA, etc.',
            'note' => 'Required if you select "Other".',
        ],
    ],
    'buttons' => [
        'next' => 'Next',
        'back' => 'Back',
        'submit' => 'Continue & Submit Discussion with the iProc Team',
    ],
    'assessment' => [
        'title' => 'e-Procurement System Needs Check',
        'q1' => [
            'label' => 'Are procurement processes currently carried out outside the system or difficult to trace during audits? <span class="text-red-600">*</span>',
            'yes' => 'Yes',
            'partial' => 'Partially',
            'no' => 'No',
        ],
        'q2' => [
            'label' => 'The urgent needs you want to improve in the near term (choose a maximum of 2) <span class="text-red-600">*</span>',
            'speed' => 'Procurement process speed',
            'transparency' => 'Transparency & Audit Trail',
            'vendor_control' => 'Vendor Control & Evaluation',
            'cost_efficiency' => 'Cost Efficiency',
            'other' => 'Other',
        ],
        'q3' => [
            'label' => 'Does your organization use bidding / tender processes? <span class="text-red-600">*</span>',
            'regular' => 'Yes, regularly',
            'sometimes' => 'Sometimes',
            'no' => 'No',
        ],
        'q4' => [
            'label' => 'What is the most common way procurement is currently managed? <span class="text-red-600">*</span>',
            'manual' => 'Email / Excel / WhatsApp',
            'internal' => 'Simple internal system',
            'erp' => 'ERP / enterprise system',
        ],
        'q5' => [
            'label' => 'Is your vendor database already centralized and well documented? <span class="text-red-600">*</span>',
            'centralized' => 'Already centralized in the system',
            'manual' => 'Not yet, documentation is still manual',
        ],
        'q6' => [
            'label' => 'Expectations for an e-Procurement system <span class="text-red-600">*</span>',
            'ready' => 'Ready-to-use system (plug & play), minimal customization',
            'gradual' => 'Gradual, only necessary configuration',
            'custom' => 'Needs to be adjusted to special policies / requirements',
        ],
        'note' => 'This form is an initial assessment stage. Process details and requirements will be discussed further in a session with our team.',
    ],
    'consent' => [
        'label' => 'I have read and agree to <button type="button" id="openConsentModal" class="underline text-blue-700 hover:text-blue-800 focus:outline-none hover:cursor-pointer">the Privacy Agreement</button>.',
        'helper' => 'In short: iProc, ADW Consulting, and Pengadaan.com <strong>are committed to protecting your privacy</strong>. We <strong>will never</strong> sell, share, or distribute your personal information to third parties for marketing / commercial purposes. Your information is only used for communications related to our services. You can withdraw your consent at any time via <a href="mailto:support.cloud@pengadaan.com" class="underline text-blue-700">support.cloud@pengadaan.com</a>.',
    ],
    'success' => [
        'title' => 'Form submitted successfully',
        'description' => 'The information you provided will help us determine whether your needs are better suited for iProc Cloud (plug &amp; play) or a custom solution (private / on-premise). We will contact you via email or WhatsApp within <strong>1-2 business days</strong> to follow up on the discussion or demo session.',
        'page_title' => 'Form Submitted Successfully',
        'page_description' => 'Thank you for filling out the iProc Cloud needs assessment form.',
        'thanks' => 'Thank you for filling out the form.',
        'back' => 'Back to the previous page',
    ],
    'modal' => [
        'title' => 'Privacy Agreement for Form Submission',
        'close' => 'Close',
    ],
    'js' => [
        'alert' => [
            'info_title' => 'Sending...',
            'success_title' => 'Thank you for completing the initial assessment.',
            'danger_title' => 'Failed',
            'warning_title' => 'Needs attention',
        ],
        'submit_loading' => 'Sending...',
        'processing' => 'Please wait, your data is being processed...',
        'step1_required' => 'Please complete all <b>Contact Information</b> fields first.',
        'step2_required' => 'Please complete all questions in the <b>Needs Check</b> section.',
        'need_min' => 'Please select at least <b>1 urgent need</b>.',
        'need_max' => 'Please select a maximum of <b>2 urgent needs</b>.',
        'other_required' => 'Please fill in the explanation for the <b>Other</b> option.',
        'consent_required' => 'Please check the <b>Privacy Agreement</b> first.',
        'submit_error' => 'Failed to submit the form. Please try again.<br>Or you can contact us directly via WhatsApp: <a href="https://wa.me/6285215356968" class="underline text-blue-700">https://wa.me/6285215356968</a>',
    ],
];
