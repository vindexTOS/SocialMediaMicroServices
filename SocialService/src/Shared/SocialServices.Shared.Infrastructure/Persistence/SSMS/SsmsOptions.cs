using Microsoft.Extensions.DependencyInjection;

namespace SocialServices.Shared.Infrastructure.Persistence.SSMS;

public class SsmsOptions
{
    public string ConnectionString { get; set; }
}