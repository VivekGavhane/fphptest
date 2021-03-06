<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>支付宝即时到账交易接口接口</title>
</head>
<?php
/* *
 * 功能：即时到账交易接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 * 1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 * 2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 * 3、支付宝论坛（http://club.alipay.com/read-htm-tid-8681712.html）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */

/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
    "service" => "create_direct_pay_by_user",
    "partner" => trim($config['partner']),
    "payment_type"  => '1',
    "notify_url"    => $notify_url,
    "return_url"    => $callback_url,
    "seller_email"  => $config['seller_email'],
    "out_trade_no"  => $order->order_no,
    "subject"   => $order->order_name ? $order->order_name : '',
    "total_fee" => $order->original_money,
    "body"  => $order->order_body ? $order->order_body : '',
    "show_url"  => isset($order_url) && $order_url ? $order_url : '',
    "anti_phishing_key" => '',
    "exter_invoke_ip"   => '',
    "_input_charset"    => trim(strtolower($config['input_charset']))
);

//建立请求
$alipaySubmit = new \impls\alipay\AlipaySubmit($config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;

?>
</body>
</html>