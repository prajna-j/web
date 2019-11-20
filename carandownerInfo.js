/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class carownerInfo {

    constructor(image, ownername, contactno, address, price) {
        this.image = image;
        this.ownername = ownername;
        this.contactno = contactno;
        this.address = address;
        this.price = price;
    }

    getImage() {
        return this.image;
    }
    getOwnername() {
        return this.ownername;
    }
    getContact() {
        return this.contactno;
    }
    getPrice() {
        return this.price;
    }
    getAddress() {
        return this.address;
    }
}
