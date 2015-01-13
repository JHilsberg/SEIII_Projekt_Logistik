<?php
/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 06.01.2015
 * Time: 12:44
 */

class SubmitController extends BaseController{

    public static function get_order_as_xml($order, $abholadresse, $lieferadresse){
        $domtree = new DOMDocument('1.0', 'UTF-8');

        $xmlRoot = $domtree->createElement("order");
        $xmlRoot = $domtree->appendChild($xmlRoot);

        $xmlRoot->appendChild($domtree->createElement('id',$order->id));
        $xmlRoot->appendChild($domtree->createElement('userId', $order->userid));

        $loadingPlace = $domtree->createElement('loadingPlace');
        $loadingPlace->appendChild($domtree->createElement('company', $abholadresse->firma));
        $loadingPlace->appendChild($domtree->createElement('street', $abholadresse->strasse));
        $loadingPlace->appendChild($domtree->createElement('houseNumber', $abholadresse->hausnummer));
        $loadingPlace->appendChild($domtree->createElement('city', $abholadresse->ort));
        $loadingPlace->appendChild($domtree->createElement('zipCode', $abholadresse->postleitzahl));
        $xmlRoot->appendChild($loadingPlace);

        $deliveryPlace = $domtree->createElement('deliveryPlace');
        $deliveryPlace->appendChild($domtree->createElement('company', $lieferadresse->firma));
        $deliveryPlace->appendChild($domtree->createElement('street', $lieferadresse->strasse));
        $deliveryPlace->appendChild($domtree->createElement('houseNumber', $lieferadresse->hausnummer));
        $deliveryPlace->appendChild($domtree->createElement('city', $lieferadresse->ort));
        $deliveryPlace->appendChild($domtree->createElement('zipCode', $lieferadresse->postleitzahl));
        $xmlRoot->appendChild($deliveryPlace);

        $xmlRoot->appendChild($domtree->createElement('pickUpDate', $order->lieferdatum));
        $xmlRoot->appendChild($domtree->createElement('minDeliveryDate', $order->minlieferzeit));
        $xmlRoot->appendChild($domtree->createElement('maxDeliveryDate', $order->maxlieferzeit));

        $xmlRoot->appendChild($domtree->createElement('numberOfContainers', $order->anzahltransportbehaelter));
        $xmlRoot->appendChild($domtree->createElement('descriptionOfGoods', $order->warenbeschreibung));
        $xmlRoot->appendChild($domtree->createElement('hazardousGoods', $order->gefahrengut));
        $xmlRoot->appendChild($domtree->createElement('goodsPackaging', $order->warenverpackung));
        $xmlRoot->appendChild($domtree->createElement('weight', $order->warengewicht));
        $xmlRoot->appendChild($domtree->createElement('comment', $order->bemerkung));

        $meansOfTransport = $domtree->createElement('meansOfTransport');
        $meansOfTransport->appendChild($domtree->createElement('hgv', $order->lkw));
        $meansOfTransport->appendChild($domtree->createElement('ship', $order->schiff));
        $meansOfTransport->appendChild($domtree->createElement('train', $order->zug));
        $meansOfTransport->appendChild($domtree->createElement('car', $order->pkw));
        $meansOfTransport->appendChild($domtree->createElement('flight', $order->flugzeug));
        $meansOfTransport->appendChild($domtree->createElement('others', $order->egal));

        $xmlRoot->appendChild($domtree->createElement('sent',$order->abgesendet));

        return $domtree->saveXML();
    }

}