@extends('layouts.master2')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12  mb-5">
            <img src="{{ asset('/images/kt-balecatur.JPG') }}" class="img-fluid" alt="Karang Taruna Balecatur">
        </div>
        <div class="col-md-6 ">
            <video autoplay controls width="100%" class="img-fluid" style="max-height: 400px;">
                <source src="{{ asset('/videos/kt-balecatur.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="col-md-6 ">
            <h2 class="text-center">Visi</h2>
            <p class="text-center font-weight-bold">Mewujudkan organisasi yang dapat menghubungkan dan menwadahi pembinaan, pengembangan dan penyaluran peran pemuda dalam mewujudkan kesejahteraan sosial di wilayah Balecatur dengan memaksimalkan Ilmu Pengetahuan dan Teknologi</p>
            <h2 class="text-center mt-5">Misi</h2>
            <p class="text-center font-weight-bold">
                Mewujudkan pemuda yang komunikatif serta terhubung baik di kalangan pemuda padukuhan dan/atau dengan pemerintah kalurahan Balecatur.
                <br>
                Menjadikan Karang Taruna Balecatur sebagai wadah dalam menghimpun serta penyaluran peran pemuda dalam mewujudkan kesejahteraan sosial melalui berbagai kegiatan kolaborasi
                <br>
                Menciptakan pemuda Balecatur yang paham dan bijak akan penggunaan teknologi sebagai alat memajukan organisasi
                <br>
            </p>
        </div>

  <!-- Program Kerja Cards -->
  <div class="container mt-5">
    <h2 class="text-center">Rencana Kegiatan</h2>
    <div class="row">

            <div class="row">
                @forelse ($program as $item)
                    <div class="col-md-4 mb-4" data-tanggal="{{ date('Y-m-d', strtotime($item->tanggal)) }}">
                        <div class="card d-flex flex-column">
                            <div class="card-body">
                                <img src="{{ asset('images/program/' . $item->image) }}" class="img-fluid card-img-top object-fit-cover" alt="{{ $item->title }}">
                                <br>
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="tanggal">{{ date('d-m-Y', strtotime($item->tanggal)) }}</p>
                                <p class="card-text">{{ substr($item->deskripsi, 0, 100) }}...</p>
                                <a href="#">selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Belum ada data rencana kegiatan</h3>
                @endforelse
            </div>
        </div>
    </div>
  </div>


  <div class="whatsapp-float">
  <a href="https://wa.me/6285711852487" target="_blank">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAA9lBMVEUazhv////9//////3//f8azR38//////sZzxr//v3///r6/////f78//37//oAwwD5//f7//cAyQD0//Lt/+zj/+X///Z02Xbx//L1//fv//AJzQp51n3d/9oUwxqC3YIiwyhYz1+j5Ke68LjS+dE4xDjg/+NJzEkuxy05zjvD8sSY3ZUAwAAVvRJn1WZy2XBVzVJMwU7N/82v77Q/xUqW4pGE3Iuc6KFWz1618L7P9Myv8rST65Gl8aFDzUeR45pF2Ebq/uF+34fe/9WF54Gj4pq/+b9pz2bE7sq+8srE8Luy9K1+6YFWxFlZ2Fxw0HSx5a16zHoBN5FsAAAW50lEQVR4nO1dCVvbuNaOZCuSYtkKTkIWE8eQOAmpEzKlIbS0cJkOcKfc6cz3///MJ8lLVsoSGzp9/D4zDAzE1mtJZ9M5x4WCBEKFXxy/PsPCr8/w18avPn/ol9+Dvz7DHDly5MiRI0eOHDly5MiRI0eOHDly5MiRI0eOHDly/FwgCk4M9dNbj2l3qJNXyQTZdjAee/5gMjmp1+snk6nvjceuLZjKv1CZIP/Kc1pJjti26/12cNR93+tXK5YAgNAsV6/b729Pryb+uGBLjuRfyVCsSRt9OPhn1C5bAGgMQA0AJv7RAQCYUvHVbLzvzv4a2sh1/z0EFyO1h5OLXhUCnWkUmvtmEZqUSpI61SDe13QIBVmKK+3Rmc9t5w0H/RwghAgRX7h70q01xTQBXUyZmC8NQhCDUgjlnAq2TM4qsKrvz/xAffJfIH/E5nMDf962DPBkUEBL1dGJy5F8RD/3gkXIsb2TUQmApTl7HMzCGoC1mVitb83gYUhxKKQndzu9soV1ahSfMYfUNHRdrNfq6bkrrlT4KZWl3ENi/jo9sF981vxJaNFUii35ccoLzs8oduT+IUGnLdSAkCMhRapUwpMmcfGt3ri4tJ2fcA4FP/fwfRlDsMLwuZMpNKVuVGfez0ZRyj9+fNSEmmDIYMiQyilUVJnSDGoRxpA/a3JtCmW5NtEM4lK7ztHPtReFAqy3oRitHHzEUFOLFJpSa5iV60/di/nnjsLZ7Mv9qN+yqFT/bHMpm4xVTo9/KhvAsYdHTQyLaqwRQyoZitEbZq07O5n6rgAPtR0POHeHl4e/n/7ZsrQtK5WJWa9Ngp9nEgk/7+1hbJoLhnIK5aaqjK4GHuLKjVAOk3SbJE3hQglr1D2e3PQXSzfatdBgmIHGVagb39wAEDrevWoCXW29cIvpJtTFV6P18YRzXohcwVWfMP6W8+A/V23xeVbCq0oGwt6Ai+fyEzAcnlqWBosJQwg0HePm6GyoVmVsam7zetWqFUbs5KKKgbrEssSBtYmw4956rRL+oSfEplVazKFwGXC1ezd21PCTIT7g14feL/dnbQOu7kmKjUbn7TejfdgXlAAuxUtMqobG0TQQc6d898JjDENTm/Bhpy39SEwX+l8rNm8C+YjebqUS+666Lghp5f4Dd57tIQibz+v0AV61EbT9U0/dKP2xPwWkwOuNdWlfGp0H7sviLoR7V1UQmgORtDFNeDtGb2aJI7tT1cxVgtedUOs9n6Fc0oRPuxazFgwNQfd2+FbeBkL1qnjI8Vh0KkRo9xK9ULzHj8TtXEO5maNVynRo3HoqdJDi0J8Ie1I1BENNi4010Oi4uw6EOMHgk9QUC62h41OXvAVD+7CiBqJFFHXaHvBVnyCal2esWCl6UTAv7y9t76Kxf+++fmwDoUEf6ixiqEGIYddfVwfPZ1hAYhUg/ncNJrOoQQOXZvzVpxD57YV+kAwr71xlcKbwrKXA6Zs4XPtSOzLW/J3vft3nDcLtaslWgWIyywe88DIZuvXy3B/tl0BsjDNmtM5fWe3zKwMmJoxwbat30n2QY0hjDoUpi8bfsNyD8TMEtWOCXi327xB70tSVmoCU6ZogeGgLjZXW7UNz1rsFumDIYn+s677aViRO4fia6VTcnJpY03W9eseJWqBpiXS13MVGCGPioU9tzuxXo+jwERC8xO01jDHQW5MAqdOj1HRW6HW5XVPpfkVQM5rT15I2xO5YmOky1KBp2AJ7Bzxy3FNlKK7p/QkXDIus/VrrFA0Sf4ICaFXOeOTJbhnoLrdBBcdvMxm6UyrX0MtXPBVt9NiNidddsbbvg3APps5QLAl7WqVGxBBrtPrXq5zbOHUz9lGpCazRED1YTLzjcAhx3INyMWLIMGWfvOzXKSq4X/XECzf12gCtKHoVlUGxQ78rQ4TGpxCYtAQo1QEumgfZy1Nkn0VH1CHqoTexxFA463w8HHqel8ZRmeP1xE6kTAHgaz9rhgj5taVAPLwP0BpDocfqp1+r1Vqtdnu++6YhhcsmgHq0K7B5lakJLmm4N5q2OFNqD6NoaMKQOMPTMo6suf6HXYcj7CR+tZBqEPZ9kl3QRmm8QQuYoe8mFNXeZMVSUzsvuNVYfHwBPu6qo2W8bthbpjjP0FWUWpjPcXhmpOKiXXdFXAqCzrgLwhiEYlj1nx9024A9WWgnaYFnqDAEg+P+8s0GGwrBPRLO/oIh/MJ3H48jLroQbXiWYe4NKfA/sB4HiXRwtS66Cbors+U5BO1xGve9vAbJIZzWPs5O1pCC19f1hGLNX9d3ZNgGKwkKplXfXWMI0+YzYGEwSMCq73zFB4HQxNL1ONSnzdZXILHfQbjCENPbNCax4NfkmXK0/T/tHNB7ECgYlaTHxlRYuna8fkjr+FW4ckLGMG5Mdz11kALOnieBcEgrg+wYDvdKidTGN1xph6Xh83fAXD0DpAx82fV8TJ2n+tVFEkDpHzu9eMLavWYgYigMxeqAhPdPfk3G/fVUKOEf11Kxs/jRfixOWanmpnDFbSBuG1imaUoOGJ4Kr3A1uuZMm2At7QCLPz7ju6fjIeewmjy6UnmS1WHUZUU3I4awWXfU/lqaQ6cDoLZ6FFU0AOi5aOesCkLcUbR6KNXwvZ1NDqP9TosZQqOv7LHl3YD4Fx3S9cM2CozJ7klcQhN3YKj25Srpu1kwRIiPqA6jObTmHK3/PrjdnpDY3d0dINKnwSyWco0UnJYt9yDDmtD2WsiwNVjTheLHcW8rw2JluOt4pEcddPcTcWocBelTFNNwVxYWJw2dp16wYW8Sr7adIZjtbNcIvWR39sK0MXmPPzORpvwIi12mQiYaOLI3LDbH629lyMS22fnmwikcVqkeMhQ+y3EW+tAdyYNC9Q/QzjejTORBhq3jFG4vpSkMI+CAVu6yEDXCqg5PCqFGm+5GdA0Rd/s+ZKCdygO3jwCM0hy1/XfpZ0uTwm8VpimfyDDBiG8wJIXxPTP3NxPxqDFPZTjCEY4vbmopyOd1ILtjUcmwWDRMON/GMJgJK22ToZWWkTWuxGvEpL30A/zIPoWmFh8DTTbPQlHBrhsaYxsMK5OUpELQhlFCLsP99KOKKPgGIoaMWf5GXYR0AD404rDf8iKdjdMJrBBhccQMS43D9CWN+16tEfGvrtfcDe9FJlEIlV9cEzU6XYtWvRyEz3DE0GDmgZ12QEq6RtEuYOC/23eWPaPmKkMG3g/T6pBKCpPQ+2TABOYsfYZ+K9pijILTxT5fvo0zrawlNdPeMDVflTiDqNCI7kNwaq/dfGc4hxYMFS5gePaAJAs+glX/sDVNcQjCqpHXhNI7lfoqxUtLOAfANAVDIWl07Y9QG23cwz5prm7D9jhFgUC8NghHIJ51z03bCXaEsguvLwZ+grYzRO631TmsyDlMqeSXFNxPi8yMXupxYeeGYhYyhPAuyuZaHwOx7/ZWJ/HWTY8hcv9cZpjGNZchrMLYAwV7gwecdkHx26ptaqWXrSXm8GMoCCT6XlrXjbHMsPwQQ4Fpiy2LU9g/TquKeZVhLfXzbsEwKnRloPkDhnwGdJAkMkNsXqSm8ZFkGBXXspqXxjWXETIMDcMfMURuX8dJ0S8uwWY9SEdvqTkEGc7hacRQDP5HDIkj1unCeKOA1X5LaQ4J78ZrH2azStmC4cNXJw4/gwwuXAzhAHupMHTWGKadO7TM0Jo+yBAJiu4IaCtq8WMqhS9Lc6hkadp2qT0H8cEhNA4fvLgqkZnWljWGrsMjm+xeFIpQGPcOn3I79eN8e7bQAPDkxxfnB+aSIywejNXhqTD8tLDa3qfO0KnDRYTijx+rccTnSxpRlkVZZ8HOIyAymJfYNKP0GR5asWdE6ecfXxwVxiOaHGkWoc6sZueh0JHwrqJKykcOGh1neB3lYgLlW6TN0K/E+7CE7x9jSPweXkyiDKzgWbBFxcgkUve8PghslQT345XsHFdihnroH6YK4tXiGAymI/cRUU34YXXJeIMa1vbn3tZhB58bsHo/CezHYgHEOS8pmwZCTQfz9FP43PfxeKkM0z8yHMTrS64i3sM6sG79Lc+d1CviD7Ry72/vkcIfYs9C/038uW51Up9D4folDPWy/yhDxP8HmB7tRdPShDLF/cNgOVNalWBeCukBpVtW7B0MeZRMvfWShH9UK1/VqlZ+S72WHfF/krxZnU6eUDpiz2VqSmyDKDSOvKXPSa7ep0giic3abJ8N7Yf7fqAg2dtMyyJe6pwZscOgb6bSbPlAwb1ZFBJGI4O9SUDij4r/BF0jiiGHxlJ7Nn7w1B+NWyFD+YkMYt7E+auRiH/wjT+a4iwWm8zvXe6MIUsz9i6GPIoOIMLPyiCOPwr5sU9h+WvHtbcn/aPvRjyHJuhmcDJDhnHSnhhShT8ho0Wo6O5akT1jltGYD9VSdVBQb7Klkli5C+Q8ng35Nob8CBqhpIGW+S51glIzj5aG+p0/ylAWc3sfTX31JMMyoXE9H7iOU0CTmqVym5cBizru17cZee4nwTDUFrh5l8Ept2NfLDkM840z4C0fkbN4utYuChoGNGn19NAd/9XGbJMh3N/HlemWqw+rpbi+BPTTOHPdHO/fJkwmpPcEO1Mm3BD3i0mTbD4VqNOZhi3Y7HWrYglvtuihsiqvs54TSAr2QRPrMcNeBvVB4o5+FSR1CM3Bkz4lOwrOKsleU2XRS/OmxRW2ayhv5mwS+0+DxgyNo0wqoIj7iUIrGg+cP+kecjcFk2osA8OeO4ohXC4hXod1snYdsacva5ZGo082DzPJ+hJWU0mPW1ax/tNSBWTJFz/8Gj2WJCdMRZYpVWkd2xgekvVV6nSaMDrlFu5vFpXdssvjZcOIjBSmWydPMptU60vkfxPmjQ72sMZi+4ZS2aNnGz3xuy11I+5I1gZB9XF8v1Wd7A7Ce4nMYM8pNCAFd2bpRaNItdhFBw/On8T79ZA9Khw21AeUKwbOUz88jMA7IK4LYKz1g4DbOgjh07YJTE2LNiD7McPZui5C7kUcYRDivDrOqCBYmDVmbGMJkT+zn77dhS3qzZsGxeAxhmKz6eZkReHL7/1qnLmq6/gotvtSB+Hf9OicWVZb+M8SaCg47AFTqPvwKB5ul6JSGmltb61QhfB52JZP/FJn5Y3s5NSAChOYMISlz8/aDahgu7O+oUxxsZfEXG2XM5C17hBaPh1EBeT3ox53QtjgUbhLM2FIvHbMUKA2fM5n5YTb/qymZlAXDM3tDLW92dpBByJBmIURVh7DDo8vmT4I/wx0IfJDo4TOn5N6Ffb74v5Ve0+XDGFpcxuWhF1WueFrvVqIM6gmSkbT28NMW9UdV5mFQ4YY155mui2DONz/Y7T3QHdTDWuVzQYwxL1YtHLTgGoCkl35mjuHBgwZmpb5gjYH0sbxpvOl3iVLMLXR+RZzZdKU/UJDY08IuIzb1A6q0AgZQob3vj/f1Q77Cg4PPjY2KdY67lpVv/zj8cg0Q4bShL/JulVNMIMwdg2EnzZ8gQmM1PENR/8btcpJZSGE5f7vSQbJouhWJnuVWFTIAg392s+6YJ0c1yLnR1lf/7wkJQKFcofz4d833ZpCv/tuGiySgJYCcmjQXFTlQnAVZM7Q/iwkTRJgMv7z0tsJd0EW+Qbu8Pj4eBhwGy23ul6Uhnu9xd3EovFJ1gxRwW0zgKP2O6bx4pRy5XWE30SdPraMXCzmG4DDkj/Z7Nw6eI0+PM7/mSzW1qy17bzluSAxw3D5Lq1QwjtKs6hSK6Ccjux7mhPnwNLjOG5KB9iLOVxpxCAInl8DlrTEYq1zvmUlpw1k38NkDunv6d0mbBC5YCjMUeK395NTOoH5spjJbDsK21RZh+HWn2Z1HxlxRn6PyVIxeS8pT2suiZqBZotpky1yr4aZMUQFx+2G1prMa5V9pad8tX9DRne2z6JCYKkOj8YZ7QbZ0MfrwqjZJ5O16s0OL7wGQ4e/jzxgKojWM5Fs8oCt4HhdzKzYehX7/rV6fRG/Ea1QqrPGJcqiXlUdIbpRNWNY6aSBftxoIGuevF5MYjXg02Pn+S+G499ivGBoAuH4R9wyfssQ4feJa64LVy39O6hVYQ/6cg8mR4vQWmSrZM1w2JZdFUJJY90lff4W+npnyHcs/F2VqXFhAQtkum5dBa/WUXBaMaKiBFhccUaJUmG7c3SE5Tsvx2dckqHOZIFHal0nHwGfARPHXeIugqWUDJsHw+/fd88vR+7lN5MlWYKy+sH46BH0YEOxNCGPA0emlTCUJfmhMLU5+v6uXW00u8MXZ/JEw+cHVbxokEJVDpunmoO/DsNBU8MyNg9UMa70KxxbzN2sZ4WhbNA6c/mj+VvbofzFy/8WxUaHse9PdQ133dgkz56hcGawDMeHDL+NHeR60z+6rcVxi5je0eRF/QCIvPxwVjFMY6kADmKVhYjI6zAskGBEFQ8pafBs7J986TXDdrhhvwNhkTPQvJi+4PRL9WT/ik3dWImGixksuLHjmDlDUhhey7dPUcXQHN3KbhyayszHyuuniiIDrftBEPt8T+Aaht+8ThuLdc4gxklYhu3NVTFDWproUYbo+1LRT9JlN5w8GtuPCo3Tiesoek9hKKxdf9aGLD6cSEJPjbPAeSU1GIIfLSXhR2/HUf9j83U4oCnfF/fQCxESqPc+Fty7ec0S6yA+Ho4Z1iYZHfY+BOT2F/3gVwLzm0cQpgGs2umBH9g/4Ch/ZbvTm17TKplQi/z5mCEdDTh5aRP7l4FfNqFaj2EvtriEZivC31m10bvvLndsG0WEwklVzTFtYST49YteBcumTIv0Lw1TGXVuffHUi8Bew6uPYc+oIUSKFhfPhHgo3yCaS6vZ7x7V/XHAObJltrbjcM5tO/C+nx31qk0c793kaVHhlwHaOl8cdb8aQ94DhiZzKOLpe5ShnItiUfKstr91j67O1Pue3h0ddT+JjSdMW5likxhoMUOmg+bpqnH0KhQJuWzJV2zFDNWoTBNGLwgCtFGRgmf1dB4aFqZYqBetZOGQhYotaaYkD8XXRDeoDJvwWrB9slbm+xoMhdM225fbBSZqQh4GmVCGw2hFbLjDu5Gpsz3r4c25FTRhCOWzEDZbNcvWiA8CyfRHau4nwiVqTSe2DK72/rmTbxK13YO2sNuM5zFMpls1faagciFF6OtTFLf0r6m56DjHGJMtFFu127MP8tW+MkHEsb2z9rNffhhtwfDZNbpT/kZv6iSFAwvKDOhoFnUh1au9+eEwiPW6PNxE3DvrGYYgX3zGe0jl7MmzfdA6PZfJs6+q5RcE+bcw+AyLhlkSY6p2O4NxEHZjj/p5E+V/+PVvFVZ8xls6mYyHypfJzQfj1BsJPB1o2AZhPpqsEKn9M7n05AsfwhBttKzkD1KVe9ObPjQfpxaDUowrnw58vt5F8nXp/t2E4QFCuXc18MJXOoWnmguG8kVwrnQFguGk24iHvyCyap4vbCKzN/O5Qzas2NdkiFQBp2aJtenJnRfef5tEiI+OuHt+87VlybcnRPYBlgaRWI77JaVQiwaUDe7KtW5HbubwU2+3SAteG1b7p3Xvie1RQ7HDLw+OPvVbZdXVJiSq67oqPpPWQrna7747dJdaMr0hQ+fy9mrq2vYDb0HYAvVKR4RsNJwezE//227XWlZZwjKbjVq/N7qY3V1GL39MXjzwlnOIhIug0ijRU7cHUo3x5eaU76v0hv70r7u7usDdbx/8oYts9bzCc5g3JJYMd9c3SyhfN0b0XoGlA93ky9shLTtjJeFp+ZJvY8g8DemM7GdmmCNHjhw5cuTIkSNHjhw5cuTIkSNHjhw5cuTIkSNHjhw5cuTIkSPE/wOHo5k7FpyvHAAAAABJRU5ErkJggg==" alt="WhatsApp" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
  </a>
</div>
</div>


@endsection
