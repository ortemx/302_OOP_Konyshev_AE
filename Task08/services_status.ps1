Get-Service | Select-Object Name, Status | Foreach-Object {
    if ($_.Status -eq "Running") {
        Write-Host $_.Name -ForegroundColor Green
    } else {
        Write-Host $_.Name -ForegroundColor Red
    }
}
