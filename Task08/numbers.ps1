function Show-Date_Info {
    $date = Get-Date
    $day = $date.Day
    $month = $date.Month
    $year = $date.Year
    $url = "http://numbersapi.com/$day"
    $response_day = Invoke-RestMethod -Uri $url -Method Get

    $url = "http://numbersapi.com/$month"
    $response_month = Invoke-RestMethod -Uri $url -Method Get

    $url = "http://numbersapi.com/$year"
    $response_year = Invoke-RestMethod -Uri $url -Method Get

    Write-Host "Сегодня: $day.$month.$year"
    Write-Host $response_day
    Write-Host $response_month
    Write-Host $response_year
}

Show-Date_Info
