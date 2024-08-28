using System.Runtime.CompilerServices;
using Microsoft.Extensions.DependencyInjection;
using SocialServices.Module.Comments.Core;

[assembly:InternalsVisibleTo("SocialServices.Bootstraper")]
namespace SicuakServuces.Module.Comments.Api;

public static class CommentsModule
{
    public static IServiceCollection AddComentsModule(this IServiceCollection collection)
    {
        collection.AddCore();
        return collection;
    }
}