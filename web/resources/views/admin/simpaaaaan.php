<!-- @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('ubah_password_admin', Auth::user()->id)}}"><i class="glyphicon glyphicon-lock"></i> Ubah Password</a>
                        @elseif(Auth::user()->hasRole('bagian'))
                        <a href="{{ route('ubah_password_bagian', Auth::user()->id)}}"><i class="glyphicon glyphicon-lock"></i> Ubah Password</a>
                        @else
                        <a href="{{ route('ubah_password_bagian', Auth::user()->id)}}"><i class="glyphicon glyphicon-lock"></i> Ubah Password</a>
                        @endif -->


<form id="calx">
    <h3>Build your own PC</h3>
    <table border = 1>
        <thead>
        <tr>
            <td style="width:20px"></td>
            <td style="width:450px">Item Name</td>
            <td style="width:80px">Price</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="checkbox" id="item1" value="150" /></td>
            <td>HDD Baracuda Black 2TB</td>
            <td>$ 150</td>
        </tr>
        <tr>
            <td><input type="checkbox" id="item2" value="250" /></td>
            <td>LCD Monitor BENQ 21</td>
            <td>$ 250</td>
        </tr>
        <tr>
            <td><input type="checkbox" id="item3" value="120" /></td>
            <td>LiteOn DVD RW+</td>
            <td>$ 120</td>
        </tr>
        <tr>
            <td><input type="checkbox" id="item4" value="140" /></td>
            <td>MotherBoard Gigabyte G5-XXX</td>
            <td>$ 140</td>
        </tr>
        <tr>
            <td><input type="checkbox" id="item5" value="30" /></td>
            <td>PSU 600 Watt</td>
            <td>$ 30</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td colspan="2">Sub Total:</td>
            <td id="subtotal" data-format="$ 0,0[.]00" data-formula="$item1+$item2+$item3+$item4+$item5"></td>
        </tr>
        <tr>
            <td colspan="2">Discount:</td>
            <td><input type="text" id="discount" data-format="0[.]0 %" value="0.1" /></td>
        </tr>
        <tr>
            <td colspan="2">Total:</td>
            <td id="total" data-format="$ 0,0[.]00" data-formula="($subtotal)*(1-$discount)"></td>
        </tr>
        <tr>
            <td colspan="2">Bayar:</td>
            <td><input type="text" id="bayar" data-format="0[.]00"/></td>
        </tr>
        <tr>
            <td colspan="2">Kembali:</td>
            <td id="kembali" data-format="$ 0,0[.]00" data-formula="($bayar)-($total)"></td>
        </tr>
        </tbody>
    </table>
    </form>
