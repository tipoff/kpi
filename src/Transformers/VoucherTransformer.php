<?php

declare(strict_types=1);

namespace Tipoff\Vouchers\Transformers;

use League\Fractal\TransformerAbstract;
use Tipoff\Vouchers\Models\Voucher;

class VoucherTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    ];

    protected $availableIncludes = [
        'voucherType',
    ];

    public function transform(Voucher $voucher)
    {
        return [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'amount' => $voucher->amount,
            'participants' => $voucher->participants,
            'redeemable_at' => $voucher->redeemable_at,
            'expires_at' => $voucher->expires_at,
        ];
    }

    public function includeVoucherType(Voucher $voucher)
    {
        return $this->item($voucher->voucher_type, new VoucherTypeTransformer());
    }
}
