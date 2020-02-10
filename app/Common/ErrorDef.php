<?php
namespace App\Common;

/**
 * API调用返回响应码
 * Class ErrorDef
 * @package App\Common
 */
class ErrorDef
{
    // 通用错误码
    const SUCCESS               = 200;
    const REDIRECT              = 301;
    const UNLOGIN               = 401;
    const ERROR_AUTH            = 403;
    const ERROR_SERVER          = 500;

    // 客户端错误 4***
    const ERROR_PARAM           = 4001;
    const ERROR_PARAM_EMPTY     = 4002;
    const ERROR_VALIDATION      = 4003;
    const ERROR_VERIFY_SIGN     = 4004;
    const ERROR_ACCESS_OVER_FREQUENCY = 4005;
    const ERROR_SKU_LIST_NUM    = 4006;
    const ERROR_ADDRESS         = 4007;
    const ERROR_SIGN_TYPE       = 4008;
    const ERROR_SIGN_APP_ID       = 4009;

    const ERROR_PRODUCT_TYPE    = 4020;
    const ERROR_AMOUNT          = 4021;
    const ERROR_GOODS_AMOUNT    = 4022;
    const ERROR_ORDER_SUB_TYPE  = 4023;
    const ERROR_ORDER_AMOUNT    = 4024;
    const ERROR_ORDER_UPGRADE_FAILED   = 4025;

    const ERROR_GET_MSP_TOKEN       = 4030;//获取msp token失败
    const ERROR_CREATE_MSP_ORDER    = 4031;
    const ERROR_SYNC_MSP_PAY        = 4032;
    const ERROR_RET_CODE            = 4033;
    const ERROR_OUT_ORDER_SN        = 4034;
    const ERROR_OUT_REFUND_SN       = 4035;
    const ERROR_NOT_OPEN_SYNC       = 4036;
    const ERROR_ORDER_SN            = 4038;
    const ERROR_SKU_SN              = 4039;

    const ERROR_REFUND_REASON_TYPE  = 4050;

    // OAS错误
    const ERROR_OAS_GET_TOKEN       = 4100;
    const ERROR_OAS_NOT_OPEN_SYNC   = 4101;
    const ERROR_SYNC_OAS_PAY        = 4102;
    const ERROR_OAS_REFUND_STATUS   = 4103;


    // 服务端错误 5***
    const ERROR_DATABASE        = 5010;
    const ERROR_MODEL_NOT_FOUND = 5011;
    const ERROR_SERVICE         = 5012;
    const ERROR_PUSH_MSG_FAIL   = 5013;
    const ERROR_CHECK_TOKEN     = 5014;
    const ERROR_CACHE_KEY_FIELD = 5015;

    // 业务异常 6***
    const ERROR_PRODUCT_DETAIL      = 6001;
    const ERROR_STOCK_NOT_ENOUGH    = 6002;
    const ERROR_OVER_BUY_LIMIT      = 6003;
    const ERROR_CANNOT_SINGLE_BUY   = 6004;
    const ERROR_LACK_PAY_PRICE      = 6005;
    const ERROR_CANNOT_ALONE_SALE   = 6006;
    const ERROR_GET_ADDRESS         = 6007;
    const ERROR_NO_DEFAULT_ADDRESS  = 6008;
    const ERROR_NOT_FOUND_ORDER     = 6009;
    const ERROR_ORDER_STATUS        = 6010;
    const ERROR_GIFT_STOCK_NOT_ENOUGH = 6011;
    const ERROR_CANNOT_REFUND       = 6012;
    const ERROR_CANNOT_REFUND_ORDER_STATUS       = 6013;
    const ERROR_CANNOT_REFUND_ORDER_VALUE       = 6014;
    const ERROR_CANNOT_REFUND_NO_SKU       = 6015;
    const ERROR_SKU_STATUS          = 6016;
    const ERROR_SKU_PRODUCT_TYPE            = 6017;
    const ERROR_CANNOT_REFUND_NO_SKU_NUM       = 6018;
    const ERROR_CANNOT_REFUND_NO_SKU_ID       = 6019;
    const ERROR_SKU_STATUS_DOWN     = 6020;
    const ERROR_USER_BP_NOT_ENOUGH  = 6021;
    const ERROR_SKU_ATTR            = 6022;
    const ERROR_CANNOT_REFUND_SUB_ORDER_STATUS       = 6023;
    const ERROR_SKU_DELETED         = 6024;
    const ERROR_ORDER_MODE          = 6025;
    const ERROR_ORDER_UPGRADE       = 6026;
    const ERROR_MODIFY_ORDER_STAGE  = 6027;
    const ERROR_SKU_INFO            = 6028;
    const ERROR_SKU_TYPE            = 6029;

    const ERROR_MODIFY_CART         = 6030;
    const ERROR_CART_SKU_EMPTY      = 6031;
    const ERROR_CART_SKU_NUM        = 6032;
    const ERROR_SKU_SALE_PRICE      = 6033;
    const ERROR_SKU_UP_STATUS       = 6034;
    const ERROR_SKU_PROMOTION_PRICE       = 6035;
    const ERROR_SKU_SALE_PROMOTION_PRICE       = 6036;
    const ERROR_SKU_DATA       = 6037;
    const ERROR_CAR_SKU             = 6038;

    const ERROR_NOT_REFUND_INFO     = 6040;

    const ERROR_ORDER_EXPRESS       = 6050;
    const ERROR_CALL_KDEXP          = 6051;

    const ERROR_SMS_ACTION          = 6100;
    const ERROR_SEND_SMS_FAIL       = 6101;

    const ERROR_ADDRESS_TOO_MANY    = 6200;// 用户地址数量超出限制
    const ERROR_MODIFY_INVOICE      = 6201;// 修改发票失败
    const ERROR_USER_INVOICE        = 6202;


    //锁车错误码
    const ERROR_ORDER_LOCK_VIN_USE        = 6310;//vin已经被使用
    const ERROR_ORDER_LOCK_ERROT_STATUS        = 6311;//订单状态不符合绑定
    const ERROR_ORDER_LOCK_UPDATE_ORDER_STATUS        = 6312;//主订单状态更新失败
    const ERROR_ORDER_LOCK_UPDATE_SUB_ORDER_STATUS        = 6313;//子订单状态不符合绑定
    const ERROR_ORDER_LOCK_UPDATE_STATUS        = 6314;//订单绑定表解绑失败
    const ERROR_ORDER_LOCK_HAS_DATA        = 6315;//未查询到vin绑定信息
    const ERROR_ORDER_LOCK_NO_ORDER        = 6316;//未查询到订单


    // 车辆异常码
    const ERROR_VEHICLE_INFO        = 6300;
    const ERROR_REPEAT_MATCH        = 6301;
    const ERROR_NOT_FOUND_MATCH     = 6302;
    const ERROR_MATCH_RELATED_ORDER = 6303;
    const ERROR_REPEAT_MATCH_VEHICLE =6304;
    const ERROR_REPEAT_MATCH_SUIT   = 6305;
    const ERROR_SUIT_SKU            = 6306;
    const ERROR_NOT_FOUND_YEAR_ID   = 6307;
    const ERROR_VEHICLE_PRICE_RULE  = 6308;

    // 官网配置异常码
    const ERROR_NOT_FOUND_STORE     = 6400;
    const ERROR_NOT_FOUND_STORE_CITY_SORT = 6401;
    const ERROR_REPEAT_STORE_NAME   = 6402;

    //官网充电配置异常
    const ERROR_REPEAT_POINT_NAME = 6500;
    const ERROR_NOT_FOUND_POINT = 6501;


    // 签名错误码
    const ERROR_SIGN_NOT_DATA = 6700;
    const ERROR_SIGN_NOT_SECRET_DATA = 6701;
    const ERROR_SIGN_REPEST_APP_ID = 6703;
    const ERROR_SIGN_SECRET_ONE = 6704;

    // P7订单异常
    const ERROR_P7ORDER_OUTNUM = 6800;
    const ERROR_P7ORDER_ADDRESS_EXISTS = 6801;
    const ERROR_CAR_CATEGORY = 6802;

    //ad-channel异常 69**
    const ERROR_AD_CHANNEL_ID = 6900; 

    // 业务异常 7***
    const ERROR_PAY_FAIL        = 7001;
    const ERROR_PAID            = 7002;// 订单已经支付
    const ERROR_REPEAT_CALLBACK = 7003;// 重复回调
    const ERROR_NO_NEED_PAY     = 7004;// 无需支付
    const ERROR_REPEAT_PAY      = 7005;// 重复支付
    const ERROR_BUSINESS_ID     = 7006;// 错误的支付业务号
    const ERROR_REPEAT_REFUND_PAYMENT = 7007;
    const ERROR_UNFINISHED_PAY  = 7008;

    // 邀请拉新
    const ERROR_GENERATE_TOKEN_FAIL = 8000;
    const ERROR_INV_TOKEN_INVALID = 8001;
    const ERROR_NOT_FOUND_VALID_INV_ACTIVITY = 8002;
    const ERROR_REWARD_COND = 8003;
    const ERROR_NOT_FOUND_INV_REL = 8004;
    const ERROR_REPEAT_INV_REGISTER = 8005;
    const ERROR_REPEAT_INV_REWARD = 8006;
    const ERROR_REPEAT_INV_DATA = 8007;
    const ERROR_NOT_FOUND_INV_REWARD = 8008;
    const ERROR_INV_REWARD_STATUS = 8009;
    const ERROR_REWARD_RULE = 8010;
    const ERROR_INV_ACTIVITY_TYPE = 8011;
    const ERROR_INV_ACTIVITY_CONFIG = 8012;
    const ERROR_INV_ACTIVITY_EXEC_RULE = 8013;
    const ERROR_NOT_SATISFY_INV_ACTIVITY_RULE = 8014;
    const ERROR_INV_NOT_OLD_USER = 8015;
    const ERROR_INV_INVITER_EQUAL_INVITEE = 8016;

    const ERROR_REPEAT_LEAVE_DATA = 8017;
    const ERROR_REPEAT_LEAVE_DATA_TUI = 8018;

    const ERROR_LOTTERY_NOT_FOUND = 8100;
    const ERROR_LOTTERY_TYPE = 8101;
    const ERROR_LOTTERY_CANNOT_PART = 8102;
    const ERROR_LOTTERY_CONFIG = 8103;
    const ERROR_LOTTERY_TIMES_TYPE = 8104;
    const ERROR_LOTTERY_DEC_TIMES_FAIL = 8105;
    const ERROR_LOTTERY_INC_TIMES_FAIL = 8106;
    const ERROR_LOTTERY_TIMES_NOT_ENOUGH = 8107;
    const ERROR_LOTTERY_TOO_FREQ = 8108;
    const ERROR_LOTTERY_DOWN = 8109;
    const ERROR_LOTTERY_TIMES_TYPE_GRANTED = 8110;
    const ERROR_LOTTERY_SHARE_FAIL = 8111;

    const ERROR_OSS_UPLOAD_FAIL = 8200;
    const ERROR_OSS_UPLOAD_FREQ = 8201;

    //其他异常 9***
    const ERROR_BLACK_AREA      = 9000;
    const ERROR_REQUEST_OVER_NUM    = 9001;
 
    //预约异常 10***
    const ERROR_RESERVE_PARAMS  = 10000;
    const ERROR_RESERVE_NO_USER = 10001; //没有相关的预约用户信息

    public static $ERROR_MSGS =[
        self::SUCCESS               => 'success',
        self::REDIRECT              => '重定向',
        self::UNLOGIN               => '用户未登录',
        self::ERROR_AUTH            => '权限错误',
        self::ERROR_SERVER          => '服务器未知错误',
        self::SUCCESS               => 'success',
        self::REDIRECT              => '重定向',
        self::UNLOGIN               => '用户未登录',
        self::ERROR_AUTH            => '权限错误',
        self::ERROR_SERVER          => '服务器未知错误',

        self::ERROR_PARAM           => '参数错误',
        self::ERROR_PARAM_EMPTY     => '参数为空',
        self::ERROR_VALIDATION      => '参数校验失败',
        self::ERROR_VERIFY_SIGN     => '验签失败',
        self::ERROR_ACCESS_OVER_FREQUENCY => '访问过于频繁',
        self::ERROR_SKU_LIST_NUM    => 'SKU数目过多',
        self::ERROR_ADDRESS         => '地址选择错误',
        self::ERROR_SIGN_TYPE       => '错误的签名类型',
        self::ERROR_SIGN_APP_ID     => '错误的签名AppId',

        self::ERROR_PRODUCT_TYPE    => '商品类型不匹配',
        self::ERROR_AMOUNT          => '金额计算有误',
        self::ERROR_GOODS_AMOUNT    => '订单总额有误',
        self::ERROR_ORDER_AMOUNT    => '订单应付金额有误',
        self::ERROR_ORDER_SUB_TYPE  => '错误的定金、意向金类型',
        self::ERROR_ORDER_UPGRADE_FAILED  => '订单升定失败',

        self::ERROR_GET_MSP_TOKEN   => '获取 MSP token 失败',
        self::ERROR_CREATE_MSP_ORDER=> '创建 MSP order 失败',
        self::ERROR_SYNC_MSP_PAY    => '订单支付状态同步MSP失败',
        self::ERROR_RET_CODE        => '错误的返回码',
        self::ERROR_OUT_ORDER_SN    => '错误的 OAS 订单号',
        self::ERROR_OUT_REFUND_SN   => '错误的 MSP 退款单号',
        self::ERROR_NOT_OPEN_SYNC   => 'MSP 同步未打开，只能同步退款单',
        self::ERROR_ORDER_SN        => '错误的 ORDER_SN',
        self::ERROR_SKU_SN          => '错误的 SKU_SN',

        self::ERROR_REFUND_REASON_TYPE  => '错误的退款原因类型',

        self::ERROR_OAS_GET_TOKEN       => '获取 OAS token 失败',
        self::ERROR_OAS_NOT_OPEN_SYNC   => 'OAS 同步未打开',
        self::ERROR_SYNC_OAS_PAY    => '订单支付流水同步OAS失败',
        self::ERROR_OAS_REFUND_STATUS => '售后申请单更新状态错误',

        self::ERROR_DATABASE        => '数据库错误',
        self::ERROR_MODEL_NOT_FOUND => '对象不存在',
        self::ERROR_SERVICE         => '调用服务错误',
        self::ERROR_PUSH_MSG_FAIL   => '消息推送失败',
        self::ERROR_CHECK_TOKEN     => '校验token失败',
        self::ERROR_CACHE_KEY_FIELD => '缓存键值配置有误',

        self::ERROR_PRODUCT_DETAIL      => '商品详情获取失败',
        self::ERROR_STOCK_NOT_ENOUGH    => '商品库存不足',
        self::ERROR_OVER_BUY_LIMIT      => '超出购买上限',
        self::ERROR_CANNOT_SINGLE_BUY   => '商品不能单独购买',
        self::ERROR_LACK_PAY_PRICE      => '无效的商品购买价格',
        self::ERROR_CANNOT_ALONE_SALE   => '商品不能单独销售',
        self::ERROR_GET_ADDRESS         => '没有找到收货地址',
        self::ERROR_NO_DEFAULT_ADDRESS  => '用户不存在默认地址',
        self::ERROR_NOT_FOUND_ORDER     => '未找到订单',
        self::ERROR_ORDER_STATUS        => '订单状态变更，无法取消，请申请售后',
        self::ERROR_GIFT_STOCK_NOT_ENOUGH => '赠品库存不足',
        self::ERROR_CANNOT_REFUND       => '此商品不能退款',
        self::ERROR_CANNOT_REFUND_ORDER_STATUS          => '订单状态不正确',
        self::ERROR_CANNOT_REFUND_ORDER_VALUE           => '订单不存在可退款金额',
        self::ERROR_CANNOT_REFUND_NO_SKU                => '订单未包含可退货商品',
        self::ERROR_SKU_STATUS          => '商品已下架',
        self::ERROR_SKU_PRODUCT_TYPE            => '错误的商品类型',
        self::ERROR_CANNOT_REFUND_NO_SKU_NUM            => '可退数量不足',
        self::ERROR_CANNOT_REFUND_NO_SKU_ID            => '不存在可退SKU',
        self::ERROR_SKU_STATUS_DOWN     => '商品已经下架',
        self::ERROR_USER_BP_NOT_ENOUGH  => '用户积分不足',
        self::ERROR_SKU_ATTR            => '商品属性异常，不能积分购买',
        self::ERROR_SKU_DELETED         => '商品已删除',
        self::ERROR_ORDER_MODE          => '错误的订单类别',
        self::ERROR_ORDER_UPGRADE       => '不满足升定条件',
        self::ERROR_MODIFY_ORDER_STAGE  => '修改订单阶段失败',
        self::ERROR_SKU_INFO            => '获取商品信息异常',
        self::ERROR_SKU_TYPE            => '错误的SKU类型',

        self::ERROR_MODIFY_CART         => '修改购物车异常',
        self::ERROR_CART_SKU_EMPTY      => '购物车商品为空',
        self::ERROR_CART_SKU_NUM        => '购物车商品异常',
        self::ERROR_SKU_SALE_PRICE     => '销售价格不的低于0',
        self::ERROR_SKU_UP_STATUS     => 'sku处于上架中,请下架后修改',
        self::ERROR_SKU_PROMOTION_PRICE     => '促销价格不得低于0',
        self::ERROR_SKU_SALE_PROMOTION_PRICE     => '促销价格不能高于销售价格',
        self::ERROR_SKU_DATA     => 'SKU空或存在不合法的sku',
        self::ERROR_CAR_SKU             => '错误的整车SKU',

        self::ERROR_ORDER_EXPRESS       => '订单物流信息异常',
        self::ERROR_CALL_KDEXP          => '调用快达物流接口失败',
        self::ERROR_NOT_REFUND_INFO     => '未查询到退款信息',

        self::ERROR_SMS_ACTION          => '异常的短信动作',
        self::ERROR_SEND_SMS_FAIL       => '短信发送失败',

        self::ERROR_ADDRESS_TOO_MANY    => '用户地址数量超出限制',
        self::ERROR_MODIFY_INVOICE      => '修改发票失败',
        self::ERROR_USER_INVOICE        => '缺少匹配的发票信息',

        self::ERROR_VEHICLE_INFO        => '获取车辆信息异常',
        self::ERROR_REPEAT_MATCH        => '重复选配',
        self::ERROR_NOT_FOUND_MATCH     => '未找到有效的选配单',
        self::ERROR_MATCH_RELATED_ORDER => '选配单未关联有效订单',
        self::ERROR_REPEAT_MATCH_VEHICLE => '请选择不同的选配车辆',
        self::ERROR_REPEAT_MATCH_SUIT   => '选装配件冲突',
        self::ERROR_SUIT_SKU            => '选装商品不合法',
        self::ERROR_NOT_FOUND_YEAR_ID   => '未找到车辆年款',
        self::ERROR_VEHICLE_PRICE_RULE  => '错误的车辆价格规则配置',

        self::ERROR_NOT_FOUND_STORE     => '未找到对应门店',
        self::ERROR_NOT_FOUND_STORE_CITY_SORT => '未找到城市推荐记录',
        self::ERROR_REPEAT_STORE_NAME   => '门店名称不能重名',

        self::ERROR_NOT_FOUND_POINT     => '未找到对应充电站',
        self::ERROR_REPEAT_POINT_NAME    => '充电站名称不能重名',

        self::ERROR_SIGN_NOT_DATA    => '未查询到签名数据',
        self::ERROR_SIGN_NOT_SECRET_DATA    => '当前secret不存在! 请先生成保存',
        self::ERROR_SIGN_REPEST_APP_ID    => '重复AppId',
        self::ERROR_SIGN_SECRET_ONE    => '请至少生成一个secert',

        self::ERROR_P7ORDER_OUTNUM  => 'P7为限量产品，请勿重复下单',
        self::ERROR_P7ORDER_ADDRESS_EXISTS => '订单物流地址已存在',
        self::ERROR_CAR_CATEGORY => '非法的整车订单车辆类别',

        self::ERROR_AD_CHANNEL_ID   => '非法的导流渠道号',

        self::ERROR_PAY_FAIL        => '支付请求失败',
        self::ERROR_PAID            => '订单已经支付',
        self::ERROR_REPEAT_CALLBACK => '重复回调',
        self::ERROR_NO_NEED_PAY     => '无需支付',
        self::ERROR_REPEAT_PAY      => '重复支付',
        self::ERROR_BUSINESS_ID     => '错误的支付业务号',
        self::ERROR_REPEAT_REFUND_PAYMENT => '重复的退款流水',
        self::ERROR_UNFINISHED_PAY  => '有未完成的支付订单',

        self::ERROR_CANNOT_REFUND_SUB_ORDER_STATUS            => '子订单状态未签收',

        self::ERROR_BLACK_AREA      => '当前城市暂不支持下单业务',

        self::ERROR_REQUEST_OVER_NUM      => '请求uid参数过大，请限制个数300以内',

        self::ERROR_ORDER_LOCK_VIN_USE => '此车辆VIN码已被使用',
        self::ERROR_ORDER_LOCK_ERROT_STATUS => '订单状态不正确,请确定订单合同已签署',
        self::ERROR_ORDER_LOCK_UPDATE_ORDER_STATUS => '主订单状态更新失败',
        self::ERROR_ORDER_LOCK_UPDATE_SUB_ORDER_STATUS => '子订单状态更新失败',
        self::ERROR_ORDER_LOCK_UPDATE_STATUS => '解绑VIN失败,请重试',
        self::ERROR_ORDER_LOCK_HAS_DATA => '未查询到VIN绑定信息',
        self::ERROR_ORDER_LOCK_NO_ORDER => '未查询主订单',

        // 拉新
        self::ERROR_GENERATE_TOKEN_FAIL => '生成邀请链接失败，请重试',
        self::ERROR_INV_TOKEN_INVALID => '非法的邀请链接',
        self::ERROR_NOT_FOUND_VALID_INV_ACTIVITY => '当前活动已结束',
        self::ERROR_REWARD_COND => '错误的奖励条件',
        self::ERROR_NOT_FOUND_INV_REL => '未找到邀请关系',
        self::ERROR_REPEAT_INV_REGISTER => '您已经接受过邀请哦',
        self::ERROR_REPEAT_INV_REWARD => '您已经领取过奖励哦',
        self::ERROR_REPEAT_INV_DATA => '您已预约过试驾',
        self::ERROR_NOT_FOUND_INV_REWARD => '找不到有效的奖励记录',
        self::ERROR_INV_REWARD_STATUS => '奖励记录状态非法',
        self::ERROR_REWARD_RULE => '不满足奖励规则',
        self::ERROR_INV_ACTIVITY_TYPE => '当前活动不存在',
        self::ERROR_INV_ACTIVITY_CONFIG => '活动配置有误',
        self::ERROR_INV_ACTIVITY_EXEC_RULE => '活动执行规则异常',
        self::ERROR_NOT_SATISFY_INV_ACTIVITY_RULE => '不满足活动规则',
        self::ERROR_INV_NOT_OLD_USER => '您需要下定金后才能参与活动',
        self::ERROR_INV_INVITER_EQUAL_INVITEE => '您不能邀请自己参与活动哦',
        self::ERROR_REPEAT_LEAVE_DATA => '您已接受过邀请',
        self::ERROR_REPEAT_LEAVE_DATA_TUI => '当前用户已推荐',

        // 抽奖
        self::ERROR_LOTTERY_NOT_FOUND  => '未找到生效的抽奖活动',
        self::ERROR_LOTTERY_TYPE => '非法的抽奖类型',
        self::ERROR_LOTTERY_CANNOT_PART => '用户不满足抽奖参与规则',
        self::ERROR_LOTTERY_CONFIG => '抽奖活动配置异常',
        self::ERROR_LOTTERY_TIMES_TYPE  => '错误的发放次数类型',
        self::ERROR_LOTTERY_DEC_TIMES_FAIL => '抽奖次数扣减失败',
        self::ERROR_LOTTERY_INC_TIMES_FAIL => '抽奖次数发放失败',
        self::ERROR_LOTTERY_TIMES_NOT_ENOUGH => '今日抽奖次数已用完，明天再来试试吧~',
        self::ERROR_LOTTERY_TOO_FREQ => '手速过快，请休息一会儿~',
        self::ERROR_LOTTERY_DOWN => '哎呀，抽奖卡住了~',
        self::ERROR_LOTTERY_TIMES_TYPE_GRANTED => '已经超过奖励次数上限',
        self::ERROR_LOTTERY_SHARE_FAIL => '获取分享美图异常',

        // OSS
        self::ERROR_OSS_UPLOAD_FAIL => '上传失败',
        self::ERROR_OSS_UPLOAD_FREQ => '上传过于频繁',

        self::ERROR_RESERVE_PARAMS  => '参数有错误',
        self::ERROR_RESERVE_NO_USER => '没有相关的预约用户信息',
    ];

    public static function getErrorMsg($code)
    {
        $msg = isset(static::$ERROR_MSGS[$code]) ?  static::$ERROR_MSGS[$code] : '';
        return $msg;
    }
}



