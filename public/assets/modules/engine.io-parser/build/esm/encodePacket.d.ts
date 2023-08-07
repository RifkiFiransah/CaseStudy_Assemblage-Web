import { Packet, RawData } from "./commons.js";
declare const encodePacket: ({ type, data }: Packet, supportsBinary: boolean, callback: (encodedPacket: RawData) => void) => void;
export default encodePacket;
