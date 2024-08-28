using Microsoft.Extensions.DependencyInjection;

namespace MyKeyBox.Shared.Infrastructure.Persistence.SSMS;

public class SsmsOptions
{
    public string ConnectionString { get; set; }
}