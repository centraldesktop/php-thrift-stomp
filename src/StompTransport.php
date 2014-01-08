<?php
/**
 * Created by IntelliJ IDEA.
 * User: thyde
 * Date: 1/7/14
 * Time: 3:38 PM
 * To change this template use File | Settings | File Templates.
 */

namespace CentralDesktop\Thrift\Stomp;

use CentralDesktop\Stomp\Connection;
use Thrift\Transport\TTransport;
use Thrift\Transport\TTransportException;

class StompTransport extends TTransport {
    /** @var \CentralDesktop\Stomp\Connection $stomp connection */
    private $stomp = null;
    private $destination = null;

    private $buffer = "";

    public
    function __construct(Connection $con, $destination) {
        $this->stomp       = $con;
        $this->destination = $destination;
    }


    /**
     * Whether this transport is open.
     *
     * @return boolean true if open
     */
    public
    function isOpen() {
        return true;
    }

    /**
     * Open the transport for reading/writing
     *
     * @throws TTransportException if cannot open
     */
    public
    function open() {
        return true;
    }

    /**
     * Close the transport.
     */
    public
    function close() {
        return true;
    }

    /**
     * Read some data into the array.
     *
     * @param int $len How much to read
     *
     * @return string The data that has been read
     * @throws TTransportException if cannot read any more data
     */
    public
    function read($len) {
        // TODO: Implement read() method.
    }

    /**
     * Writes the given data out.
     *
     * @param string $buf  The data to write
     *
     * @throws TTransportException if writing fails
     */
    public
    function write($buf) {
        $this->buffer .= $buf;
    }

    public
    function flush() {
        $this->stomp->send($this->destination, $this->buffer);
        $this->buffer = "";
    }
}